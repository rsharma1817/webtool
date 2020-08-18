# -*- coding: utf-8 -*-
"""
Created on May 31, 2020
@author: yongzhengxin
"""
import dill
import os
from globalfn.tools import get_lang

package_directory = os.path.dirname(os.path.abspath(__file__))


def all_annotations(lang):
    """
    :param lang: language
    :return: {sent_id: [Annotations, ...]}
    """
    assert lang in ['de', 'en', 'pt']
    res = dill.load(open(f'{package_directory}/_extractions/extracted/doc_ted_{lang}_ID_to_anno.dill.pkl', 'rb'))
    return res

def annotation(sent_id):
    lang = get_lang(sent_id)
    res = all_annotations(lang)
    if sent_id not in res:
        print(f"{sent_id} (language {lang}) is not annotated.")
        return None
    return res[sent_id]

def annotation_annoID(annoID):
    # TODO: retrieve annotation using annoID
    ...