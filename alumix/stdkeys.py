
from typing import Generator



def wrap_dict(d: dict, *, keyname: str = "key", valname: str = "value") -> list:
    """
    wrap a dictionary key and value
    `{<key>: <value>}` -> `{"key": <key>, "value": <value>}`
    """

    return [{keyname: key,
             valname: value} for key, value in d.items()]

def standardize_keys(menu: dict) -> Generator[tuple, None, None]:

    for key, value in menu.items():

        if not isinstance(value, dict):
            yield key, value

        else:
            yield key, wrap_dict(value)

