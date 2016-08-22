# String Crypter
Simple tool for encrypting/decrypting a string. It based upon system ID.

```shell
$ composer require rikby/crypter
```

Using example:
```php
/**
 * Class Password
 */
class Password extends Crypter implements CrypterInterface
{
    /**
     * Get password
     *
     * @param string $trackerType
     * @return null|string
     * @throws \Exception
     */
    public function getPassword($trackerType)
    {
        try {
            //get saved encrypted password
            $password = SomeClass::getPostPassword();
            if (!$password) {
                return null;
            }

            return $this->decrypt($password) ?: null;
        } catch (\Exception $e) {
            throw new UserException('Cannot get password of tracker.', 0, $e);
        }
    }

    /**
     * Replace strange \000 character
     *
     * {@inheritdoc}
     */
    public function decrypt($string, $key = null)
    {
        $password = parent::decrypt($string, $key);

        /**
         * Unknown bug in PhpStorm
         * Only PHPStorm adds \0 to the tail of password
         * Perhaps PHP versions conflict
         */
        return rtrim($password, "\000");
    }
}
```
