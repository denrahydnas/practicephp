# String Search

For this PHP code exercise, create a file named `string_search.php`. This file should contain a function named `string_search()` which accepts two parameters. The first is the string to search for (*needle*) and the second is the string to search (*haystack*).

If *needle* is not found in *haystack*, `string_search()` should return `false`. If *needle* is found in *haystack*, `string_search()` should return string formatted as `Found 'needle' at index x` where `needle` is the first parameter and `x` is the starting index where `needle` was found.

For example, if *needle* were `search` and *haystack* were `string search`, `string_search()` should return `Found 'search' at position 7`.

There are a few special cases:

1. If *needle* is an empty string, `string_search()` should return `false`.
2. If *needle* is found in *haystack* multiple times, `string_search()` should return the first index.

## Just getting started?
Review the [PHP Code Exercises](https://github.com/CodeLouisville/back-end-php/tree/master/exercises) documentation for more details on performing code exercises.

## Need help?
Jump on the PHP channel in Slack and ask your fellow students and mentors for a hint.