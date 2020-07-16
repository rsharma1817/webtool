# -*- coding: utf-8 -*-
"""
Created on May 27, 2020
@author: yongzhengxin
"""
import collections
from dataclasses import dataclass, field
from lxml import etree
import dill
from flair.data import Sentence

@dataclass
class Annotation:
    frameName: str
    frameID: int
    luName: str
    luID: int
    lu_idx: list  # [(start_LU_idx, end_LU_idx [exclusive of space], id), ...]
    fe_idx: list  # [(start_FE_idx, end_FE_idx [exclusive of space], feName, id), ...]
    annoID: int
    text: str = ''

    # tokenized by flair
    tokenized_text: str = ''
    tokenized_lu_idx: list = field(default_factory=list)  # [(token_idx, LU), ...]
    tokenized_frame_idx: list = field(default_factory=list)  # [(token_idx, frame), ...]
    tokenized_fe_idx: list = field(default_factory=list)  # [(token_idx, FE), ...]

    def __repr__(self):
        return f"====Annotation (`annoID` = {self.annoID})====\n" \
               f"text: {self.text}\n" \
               f"frameName: {self.frameName}\n" \
               f"frameID: {self.frameID}\n" \
               f"luName: {self.luName}\n" \
               f"luID: {self.luID}\n" \
               f"lu_idx: {self.lu_idx}\n" \
               f"fe_idx: {self.fe_idx}\n" \
               f"tokenized_text: {self.tokenized_text}\n" \
               f"tokenized_lu_idx: {self.tokenized_lu_idx}\n" \
               f"tokenized_frame_idx: {self.tokenized_frame_idx}\n" \
               f"tokenized_fe_idx: {self.tokenized_fe_idx}\n"

    def tokenize_text_lu_frame_fe(self, text):
        self.text = text
        sent = Sentence(self.text, use_tokenizer=True)
        token_start_positions = [token.start_position for token in sent]
        token_end_positions = [token.start_position + len(token.text) - 1 for token in sent]
        token_idxs = [token.idx - 1 for token in sent]

        # tokenized_text
        self.tokenized_text = sent.to_tokenized_string()

        # tokenized_lu_idx and tokenized_frame_idx
        self.tokenized_lu_idx = ['-' for _ in range(len(token_idxs))]
        self.tokenized_frame_idx = ['-' for _ in range(len(token_idxs))]
        count = 0
        for i, (token_start_idx, token_end_idx) in enumerate(zip(token_start_positions, token_end_positions)):
            for lu_start_idx, lu_end_idx, _ in self.lu_idx:
                if lu_end_idx == 0:
                    continue
                if lu_start_idx <= token_start_idx <= lu_end_idx and lu_start_idx <= token_end_idx <= lu_end_idx:
                    self.tokenized_lu_idx[i] = self.luName
                    self.tokenized_frame_idx[i] = self.frameName
                    count += 1
        try:
            assert count >= len(self.lu_idx)
        except:
            print("Problems with Annotations of LUs on WebTool")
            print(self)
            print(count, len(self.lu_idx))

        # tokenized_fe_idx
        self.tokenized_fe_idx = ['-' for _ in range(len(token_idxs))]
        count = 0
        for i, (token_start_idx, token_end_idx) in enumerate(zip(token_start_positions, token_end_positions)):
            for fe_start_idx, fe_end_idx, fe_name, _ in self.fe_idx:
                if fe_end_idx <= 0:
                    continue
                if fe_start_idx <= token_start_idx <= fe_end_idx and fe_start_idx <= token_end_idx <= fe_end_idx:
                    self.tokenized_fe_idx[i] = fe_name
                    count += 1
        try:
            assert count >= len(self.fe_idx)
        except:
            print("Problems with Annotations of FEs on WebTool")
            print(self)
            print(count, len(self.fe_idx))


def get_annot_helper(e):
    assert e.tag == "annotationSet"
    annoID = int(e.get("ID"))
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

    return Annotation(frameName, frameID, luName, luID, list(lu_idx), list(fe_idx), annoID)



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
            annotation.tokenize_text_lu_frame_fe(text)

            # add to dictionary: sent_ID -> annotation
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