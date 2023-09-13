<?php
namespace App\Providers;

use Illuminate\Auth\EloquentUserProvider as UserProvider;
use Illuminate\Contracts\Auth\Authenticatable as UserContract;
use Illuminate\Contracts\Hashing\Hasher as HasherContract;
use Illuminate\Support\Str; 

use App\Services\Riak\Connection;
use Illuminate\Support\ServiceProvider;



class CustomUserProvider extends UserProvider
{

    public function __construct( $hasher = null, $model = null)
    {
        
        $this->model = $model ?? 'App\Usuario';
        $this->hasher = new \Illuminate\Hashing\BcryptHasher();
   
        parent::__construct($this->hasher, $this->model);
    }


    /**
     * Retrieve a user by the given credentials.
     *
     * @param  array  $credentials
     * @return \Illuminate\Contracts\Auth\Authenticatable|null
     */
    public function retrieveByCredentials(array $credentials) 
    {
        if (empty($credentials) ||
            (count($credentials) === 1 &&
                array_key_exists('UsuarioSenha', $credentials))) {
            return;
        }

        // First we will add each credential element to the query as a where clause.
        // Then we can execute the query and, if we found a user, return it in a
        // Eloquent User "model" that will be utilized by the Guard instances.
        $query = $this->createModel()->newQuery();

        foreach ($credentials as $key => $value) {
            if (Str::contains($key, 'UsuarioSenha')) {
                continue;
            }

            if (is_array($value) || $value instanceof Arrayable) {
                $query->whereIn($key, $value);
            } else {
                $query->where($key, $value);
            }
        }

        return $query->first();
    }

    /**
     * Validate a user against the given credentials.
     *
     * @param  \Illuminate\Contracts\Auth\Authenticatable  $user
     * @param  array  $credentials
     * @return bool
     */
    public function validateCredentials($user, array $credentials)
    {
   
        $plain = $credentials['UsuarioSenha'];

        return sha1($plain) === $user->getAuthPassword();
    }
}