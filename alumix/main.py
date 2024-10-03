#!/bin/python3

import json
import argparse
import sys

from get_menu import import_menu, get_menu_of
from lang import filter_menu
from stdkeys import standardize_keys


DEFAULT_ALUMIX_URL = "https://go.alumix.it/menu/alumix/index.php"


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
                    default=DEFAULT_ALUMIX_URL)

parser.add_argument("-f", "--file",
                    help="read the menu from this file instead of requesting it")

parser.add_argument("-g", "--guess",
                    action="store_true",
                    help="try to gues the menu, if the menu can't be retrieved")

parser.add_argument("-v", "--verbose",
                    action="store_true",
                    help="show what's being doing")

parser.add_argument("--noisteria",
                    action="store_true",
                    help="load the menu of the noisteria")

parser.add_argument("--lang",
                    help="filter the result by language")

parser.add_argument("-j", "--json",
                    action="store_true",
                    help="dump the menu in a json")

parser.add_argument("--stdkeys",
                    action="store_true",
                    help="use standard keys for 'go' parsing")


args = parser.parse_args()

prefix = "alumix_"

if args.noisteria:
    raise NotImplementedError

if args.file:
    ## load from direct file
    menu = import_menu(args.file)

else:
    menu = get_menu_of(date         = args.date,
                       guess        = args.guess,
                       prefix       = prefix,
                       cache_dir    = None if args.no_cache else args.cache_dir,
                       download_url = args.url)

if menu is None:
    sys.stderr.write("Unable to load menu\n")
    sys.exit(1)

if args.lang:
    menu = filter_menu(menu, args.lang)

if args.json:
    if args.stdkeys:
        menu = dict(standardize_keys(menu))

    json.dump(menu, sys.stdout, default=lambda obj: obj.as_json(), indent=2)

else:
    ...
