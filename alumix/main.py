#!/bin/python3

import json
import argparse
import sys
# import os
import logging

from get_menu import import_menu, get_menu_of
from lang import filter_menu
from stdkeys import standardize_keys
from cli import Theme, print_menu


DEFAULT_ALUMIX_URL = "https://go.alumix.it/menu/alumix/index.php"
DEFAULT_NOISTERIA_URL = "https://go.alumix.it/menu/noisteria/index.php"


parser = argparse.ArgumentParser()

parser.add_argument("date",
                    default="today",
                    nargs="?",
                    help="display the menu of a certain date")

parser.add_argument("-c", "--no-cache",
                    action="store_true",
                    help="cache the menu page for future uses")

parser.add_argument("-C", "--cache-dir",
                    default=".cache/",
                    help="set the cache directory")

parser.add_argument("-u", "--url",
                    help="set the alumix menu url",
                    default=None)

parser.add_argument("-f", "--file",
                    help="read the menu from this file instead of requesting it")

parser.add_argument("-F", "--force", "--fetch",
                    action="store_true",
                    help="fetch the menu even if it exists in the local caches")

parser.add_argument("-g", "--guess",
                    action="store_true",
                    help="try to gues the menu, if the menu can't be retrieved")

parser.add_argument("-v", "--verbose",
                    action="store_true",
                    help="show what's being doing")

parser.add_argument("-r", "--restaurant",
                    choices=["alumix", "noisteria"],
                    default="alumix",
                    help="set the restaurant (changes the URL and the PREFIX)")

parser.add_argument("--lang",
                    help="filter the result by language")

parser.add_argument("-s", "--sort",
                    metavar="BY",
                    help="...")

## json-dump options

parser.add_argument("-j", "--json",
                    action="store_true",
                    help="dump the menu in a json")

parser.add_argument("--stdkeys",
                    action="store_true",
                    help="use standard keys for 'go' parsing")

## terminal-dump options

parser.add_argument("-t", "--theme",
                    help="set the print theme")

parser.add_argument("-P", "--no-pager",
                    action="store_true",
                    help="do not call the default pager")

args = parser.parse_args()

if args.verbose:
    logging.basicConfig(level=logging.DEBUG)
else:
    logging.basicConfig(level=logging.CRITICAL + 1)


if args.restaurant == "alumix":
    prefix = "alumix_"
    default_url = DEFAULT_ALUMIX_URL
elif args.restaurant == "noisteria":
    prefix = "nois_"
    default_url = DEFAULT_NOISTERIA_URL
else:
    raise NotImplementedError("oops")


if args.sort:
    raise NotImplementedError

if args.theme is None:
    if sys.stdout.isatty():
        args.theme = Theme.LIGHT
    else:
        args.theme = Theme.NONE

if args.file:
    ## load from direct file
    menu = import_menu(args.file)

else:
    menu = get_menu_of(date         = args.date,
                       guess        = args.guess,
                       prefix       = prefix,
                       cache_dir    = None if args.no_cache else args.cache_dir,
                       download_url = args.url or default_url,
                       fetch        = args.force)

if not menu:
    sys.stderr.write("Unable to load menu\n")

    if args.json:
        sys.stdout.write("{}\n")

    sys.exit(1)

if args.lang:
    menu = filter_menu(menu, args.lang)

if args.json:
    if args.stdkeys:
        menu = dict(standardize_keys(menu))

    json.dump(menu, sys.stdout, default=lambda obj: obj.as_json(), indent=2)

else:

    # if not args.no_pager:
    #     sys.stdout = os.popen("pager", "w")

    print_menu(menu  = menu,
               theme = Theme(args.theme))
