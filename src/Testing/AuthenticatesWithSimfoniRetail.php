<?php

namespace MBLSolutions\SimfoniRetailLaravel\Testing;

use MBLSolutions\SimfoniRetailLaravel\Authentication;

trait AuthenticatesWithSimfoniRetail
{

    /**
     * Simulate authentication with Simfoni Retail OAuth Authentication
     *
     * @param string|null $role
     * @return array
     */
    protected function authenticateWithSimfoniRetail(string $role = null): array
    {
        $key = $this->getSimfoniRetailAuthentication()->sessionKey;

        session()->put($key, [
            'token_type' => 'Bearer',
            'expires_in' => 31622400,
            'access_token' => 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiIsImp0aSI6IjBmOGMwNDAxZDAy',
            'refresh_token' => 'def5020002eca9ac7875d5d800c195024d7fb702535c0d30a0',
            'user' => [
                'name' => 'John Doe',
                'email' => 'john.doe@example.com',
                'role' => 'programme_manager'
            ]
        ]);

        return session()->get($key);
    }

    /**
     * Get Authentication
     *
     * @return array|null
     */
    protected function getAuthetnication(): ?array
    {
        $auth = session()->get($this->getSimfoniRetailAuthentication()->sessionKey);

        if ($auth === null) {
            return $this->authenticateWithSimfoniRetail();
        }

        return $auth;
    }

    /**
     * Get the Simfoni Retail Authentication Class
     *
     * @return Authentication
     */
    private function getSimfoniRetailAuthentication(): Authentication
    {
        return new Authentication;
    }

}
