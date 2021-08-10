The updates to response cache strategy are a copy/paste from the GitHub PR
at https://github.com/symfony/symfony/pull/42355.

# Setup

`docker compose up --build --detach`

# Testing

Use curl to test responses.

This will work:
`curl -ki https://symfony.localhost`

This won't:
`curl -ki https://symfony.localhost -H 'If-Modified-Since: Tue, 10 Aug 2021 07:40:30 GMT'`
