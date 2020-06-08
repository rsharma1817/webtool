# -*- coding: utf-8 -*-
"""
Created on May 31, 2020
@author: yongzhengxin
"""

import pickle
import os
from pathlib import Path
from globalfn.tools import get_lang

package_directory = os.path.dirname(os.path.abspath(__file__))

def all_alignments(aligned_lang):
    """
    :param aligned_lang: "en-de", "en-el", "en-pt", "en-se"
    :return: dictionary of ID (int or tuple of ints) mapped to a list of aligned sentences

    return None if no result.
    """
    aligned_lang = aligned_lang.upper()
    filename = f"{package_directory}/_alignments/pickled/{aligned_lang}.pkl"
    if Path(filename).exists():
        source_to_dest, dest_to_source = pickle.load(open(filename, 'rb'))
        return source_to_dest, dest_to_source
    return None


def aligned_with(ID, to_lang):
    """
    :param ID: sentence ID
    :param to_lang: the language that we want the ID to map to
    :return: (key, value) where the key is int or tuples of int, and value is the list of aligned sentence IDs

    return (ID, None) if no alignment is found.
    """
    from_lang = get_lang(ID)
    assert 'en' in [from_lang, to_lang]
    assert from_lang != to_lang

    aligned_lang = f'{from_lang.upper()}-{to_lang.upper()}'
    if all_alignments(aligned_lang):
        source_to_dest, _ = all_alignments(aligned_lang)
        for key, val in source_to_dest.items():
            if (type(key) is int and key == ID) or (type(key) is tuple and ID in key):
                return key, val

    aligned_lang = f'{to_lang.upper()}-{from_lang.upper()}'
    if all_alignments(aligned_lang):
        _, dest_to_source = all_alignments(aligned_lang)
        for key, val in dest_to_source.items():
            if (type(key) is int and key == ID) or (type(key) is tuple and ID in key):
                return key, val

    return ID, None
