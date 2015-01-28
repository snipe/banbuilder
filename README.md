BanBuilder Composer Package
===================

[![Gitter](https://badges.gitter.im/Join%20Chat.svg)](https://gitter.im/snipe/banbuilder?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge) [![Build Status](https://travis-ci.org/snipe/banbuilder.svg?branch=master)](https://travis-ci.org/snipe/banbuilder) [![Latest Stable Version](https://poser.pugx.org/snipe/banbuilder/v/stable.svg)](https://packagist.org/packages/snipe/banbuilder) [![Total Downloads](https://poser.pugx.org/snipe/banbuilder/downloads.svg)](https://packagist.org/packages/snipe/banbuilder) [![Latest Unstable Version](https://poser.pugx.org/snipe/banbuilder/v/unstable.svg)](https://packagist.org/packages/snipe/banbuilder) [![License](https://poser.pugx.org/snipe/banbuilder/license.svg)](https://packagist.org/packages/snipe/banbuilder)

BanBuilder is a PHP package for profanity filtering. The PHP script uses regex to intelligently look for "leetspeak"-style numeric or symbol replacements.

Installing
-------
To install BanBuilder, simply include it in your projects's `composer.json`. 

	"snipe/banbuilder": "dev-master",

There are no additional dependencies required for this package to work.

Usage
-------

Please see the [official package website](https://banbuilder.com) for full usage details.

Summary
-------
In a nutshell, this code takes an array of bad words and compares it to an array of common filter-evasion tactics. It then does a string replacement to insert regex parameters into your badwords array, and then evaluates your input string to that expanded banned word list.

So in your bad words array, you might have:

     [0] => 'ass'

The `preg_replace` functions replace all of the possible shenaningan letters with regex patterns (in lieu of adding the variants onto the end of the array), so the 'ass' in your array gets turned into this, right before the `preg_replace` checks for matches:

     [0] => /(a|a\.|a\-|4|@|Á|á|À|Â|à|Â|â|Ä|ä|Ã|ã|Å|å|α)(s|s\.|s\-|5|\$|§)(s|s\.|s\-|5|\$|§)/i

This means that a word can have none, one or any variety of leet replacements and it will still trip the trigger. Part of the leet filter includes stripping out letter-dash and letter-dots.

This means that the following all evaluate to the "bitch":

- B1tch
- bi7tch
- b.i.t.c.h.
- b-i-t-c-h
- b.1.t.c.h.
- ßitch
- and so on....

[![Flattr this git repo](http://api.flattr.com/button/flattr-badge-large.png)](https://flattr.com/submit/auto?user_id=snipe&url=https://github.com/snipe/banbuilder&title=banbuilder&language=PHP&tags=github&category=software)

Tests
-------
To run the unit tests on this package, simply run `vendor/bin/phpunit` from the package directory.

-----

## License

	Copyright (C) 2013 Alison Gianotto - snipe@snipe.net

	This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU Affero General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU Affero General Public License for more details.

    You should have received a copy of the GNU Affero General Public License
    along with this program.  If not, see <http://www.gnu.org/licenses/>.