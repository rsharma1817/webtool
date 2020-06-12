# -*- coding: utf-8 -*-
"""
Created on May 27, 2020
@author: yongzhengxin
"""
import collections
from lxml import etree
import dill

class Annotation:
    def __init__(self, frameName, frameID, luName, luID, lu_idx, fe_idx, annoID, text=''):
        self.frameName = frameName
        self.frameID = frameID
        self.luName = luName
        self.luID = luID
        self.lu_idx = list(lu_idx)  # [(start_LU, end_LU, id), ...]
        self.fe_idx = list(fe_idx)  # [(start, end, feName, fe_id), ...]
        self.annoID = annoID
        self.text = text

    def __repr__(self):
        return f"====Annotation Class (annoID = {self.annoID})====\n" \
               f"Text: {self.text}\n" \
               f"Frame Name: {self.frameName}\n" \
               f"Frame ID: {self.frameID}\n" \
               f"LU Name: {self.luName}\n" \
               f"LU ID: {self.luID}\n" \
               f"LU Indexes: {self.lu_idx}\n" \
               f"FE Indexes: {self.fe_idx}\n"


def get_annot_helper(e):
    assert e.tag == "annotationSet"
    annoID = e.get("ID")
    frameID = int(e.get("frameID"))
    frameName = e.get("frameName")
    luName = e.get('luName')
    luID = int(e.get('luID'))

    lu_idx = set()  # there are duplicates (e.g., doc_ted_de <annotationSet ID="10372" ...>
    fe_idx = set()

    for child in e.iter():
        if child.tag == "layer" and child.get('name') == "target":
            for target in child.iter():
                if target.tag == 'label':
                    lu_idx.add((int(target.get('start')), int(target.get('end')), int(target.get('ID'))))

        if child.tag == 'layer' and child.get('name') == 'fe':
            for fe in child.iter():
                if fe.tag == 'label':
                    fe_idx.add((int(fe.get('start')), int(fe.get('end')), fe.get('name'), int(fe.get('ID'))))

    return Annotation(frameName, frameID, luName, luID, lu_idx, fe_idx, annoID)


def get_annot_per_sent(result_annotation, e):
    # ID mapped to text
    # ID mapped to Annotation class

    assert e.tag == "sentence"
    sent_ID = int(e.get("ID"))
    text = None
    for child in e.iter():
        # get text
        if child.tag == "text":
            assert text is None
            text = child.text

        # get LU-frames
        if child.tag == "annotationSet":
            annotation = get_annot_helper(child)
            annotation.text = text
            result_annotation[sent_ID].append(annotation)
    return result_annotation


def parseAnnotationsXML(xmlFile):
    root = etree.parse(xmlFile)
    result_annotation = collections.defaultdict(list)
    for element in root.iter():
        if element.tag == "sentence":
            get_annot_per_sent(result_annotation, element)

    return result_annotation


if __name__ == "__main__":
    result_annotation = parseAnnotationsXML("mfn_annotations_xml/doc_ted_de.xml")
    dill.dump(result_annotation, open("extracted/doc_ted_de_ID_to_anno.dill.pkl", 'wb'))

    result_annotation = parseAnnotationsXML("mfn_annotations_xml/doc_ted_en.xml")
    dill.dump(result_annotation, open("extracted/doc_ted_en_ID_to_anno.dill.pkl", 'wb'))

    result_annotation = parseAnnotationsXML("mfn_annotations_xml/doc_ted_pt.xml")
    dill.dump(result_annotation, open("extracted/doc_ted_pt_ID_to_anno.dill.pkl", 'wb'))