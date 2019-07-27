# Symfony Messenger In-Memory Reproduction

This project show my thoughts about what in-memory transport of Messenger component should behave.

In short, in-memory transport should:
* return 1 message (envelope) at a time (as described [here](https://github.com/symfony/messenger/blob/master/Transport/Receiver/ReceiverInterface.php#L26))
* or at least, do not return the messages (envelopes) that are acknowledged and rejected  

It's not a bug to me. It's more like a feature that need to be implement.

Here is how I implemented it: [messenger-memory-transport](https://github.com/tienvx/messenger-memory-transport)

# Install
```
$ composer install
```

# Test
```
$ bin/phpunit
```
