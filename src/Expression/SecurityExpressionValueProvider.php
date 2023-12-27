<?php

namespace Instacar\ExtraFiltersBundle\Expression;

use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;


final class SecurityExpressionValueProvider implements ExpressionValueProviderInterface
{
    public function __construct(private readonly TokenStorageInterface $security)
    {
    }

    public function getValues(): array
    {
        return [
            'token' => $this->security->getToken() ?? 'anon',
            'user' => $this->security->getUser() ?? 'anon',
        ];
    }
}
