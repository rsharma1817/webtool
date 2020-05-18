### May 4 - June 1, 2020: Python API for retrieving aligned sentences and semantic annotations 
**Deliverables**:
- [ ] Python API with four methods to retrieve semantic annotations.
- [ ] Create second-order alignments (i.e. PT-DE, PT-EL, PT-SE, DE-EL, DE-SE and EL-SE) using existing aligned sentences.
- [ ] (Stretch Goal) API method that filters annotations by frames and valence patterns.
- [ ] (Stretch Goal) Connect API to the backend server such that the API is updated when there are new annotations.

**Actions**:
- [Completed] Scrape all the sentences and sentences IDs for 9 transcripts using Selenium. - Scrape the annotations of semantic frames and frame elements using Selenium.
- Use Google Sheets API to download sentence alignments from TED Corpus Sentence
Alignment GSoC and store them in dictionary mappings.
- Create second-order alignments through transitivity across existing aligned sentences.
- Create Python API methods for returning all the sentences, their annotations, and their aligned
sentences.

---

### Week 1 - 4: Semantic Frame Projections (w/o Neural Networks)
**GSoC-First-Evaluation Deliverables**:
- [ ] Implement the multilingual frame-semantics parser (LU and frame identification) to
identify the LU and semantic frames in the unannotated PT, DE, SE, and EL sentences.
- [ ] Implement and apply the two proposed modifications to the parser for frame
projection on aligned sentences.
- [ ] Implement a Python script that evaluates projections based on the proposed metrics. 
- [ ] Evaluate the semantic frames projections.

**Actions**:

Week 1:

- Embed the n-gram of the sentence with multilingual BERT embeddings using the pretrained
model BertEmbeddings('bert-base-multilingual-cased') from the Python flair library. - Identify words tagged with most common POS tags in the transcript using a pre-trained
multilingual POS tagger pos-multi in the Python flair library.
- Translate the words into English using multilingual BabelNet or WordNet synsets.
- Identify LUs from the translated words using the method nltk.corpus.framenet.lus(word). - Create a multinomial log-linear classifier using the Python sklearn library.
- Train the classifier to identify semantic frames with the combined train and test dataset from
https://github.com/andersjo/any-language-frames

Week 2:
- Apply the parser built in Week 1 on the PT, DE, SE, and EL sentences. - Implement modification 1 using the nltk.ngram module and
BertEmbeddings('bert-base-multilingual-cased') to produce and embed n-grams for the aligned sentences.
- Implement modification 2 by creating the graph of semantic frames using the pattern.graphmodule and realize the spread activation using the flatten(depth) method.
- Use the modified parser to perform semantic frames projections.

Week 3 - 4:
- Implement FSEM metrics by using the Python networkx library and creating a BFS algorithm. - Create a Python evaluation script that takes the sentences annotated by the algorithms as inputs
and outputs the evaluation result using the proposed metrics in Section 6.1.
- Use the Python evaluation script to evaluate the LU and semantic frames projections from Week
1 and Week 2.
- Discuss and analyze the result with mentors.
- Document the codes and result discussion for GSoC First Evaluation in Week 5. - (Optional) Blog about my progress.

---

### Week 5 - 7: Frame Elements Projections (w/o Neural Networks)
**GSoC-Second-Evaluation Deliverables**:
- [ ] Implement the multilingual frame-semantics parser (argument identification) and
label the frame semantic roles in the unannotated PT, DE, SE, and EL sentences.
- [ ] Implement and apply the constituent-based total alignment model to project frame
elements on the aligned sentences.
- [ ] Evaluate the frame elements projections.

**Actions**:

Week 5:
- Perform dependency parsing on the sentences with nlp_pipeline.NLPPipeline() .parse_conll(sentence) from https://github.com/andre-martins/TurboParser
- Train the binary classifier from https://hunch.net/~vw/ on <frame, argument, subtree> dataset provided in https://github.com/andersjo/any-language-frames.
- Apply the trained classifier on the subtrees of the sentences for semantic role prediction.

Week 6:
- Use the multilingual constituency parser from https://github.com/nikitakit/self-attentive-parserto generate the constituents for the aligned sentences.
- Use nested for-loop to implement the total-alignment model. Inside the inner for-loop, use the Python sklearn.metrics.jaccard_similarity_score method to obtain the Jaccard's coefficient.
- Project frame elements to the constituents in the unannotated sentences that have high Jaccard's coefficients.

Week 7:
- Use the Python evaluation script from Week 3-4 to evaluate the frame element projections. - Discuss and analyze the result with mentors.
- Document the codes and result discussion for GSoC Second Evaluation in Week 9. - (Optional) Blog about my progress.

---

### Week 8 - 11: Semantic Frame and Frame Elements Projections (with Neural Networks) GSoC-Final-Evaluation Deliverables (See Section 5.3 and 6.1):
- [ ] A neural network that performs LU-projection to identify semantic frames in the
aligned unannotated sentences.
- [ ] A neural network that performs frame-projection to disambiguate LU in the aligned
unannotated sentences.
- [ ] A neural network that projects arguments to the aligned unannotated sentences. 
- [ ] (Stretch Goal) Create semantics-aware multilingual BERT.

**Actions**:

Week 8:
- Identify the projected LU using the sklearn.metrics.pairwise module.
- Train SDEC to cluster LUs in FrameNet 1.7 and create semantic frame embeddings.
- Identify the best-fitting frames for the projected LU using the sklearn.metrics.pairwise
module on the embeddings of the project LU and the frame.

Week 9:
- Create the attention mechanism using https://github.com/thomlake/pytorch-attention
- Train the attention mechanism to learn to disambiguate LUs using the annotated sentences in
Global FrameNet and exemplar sentences from FN 1.7 and FrameNet Brasil.
- Apply the attention mechanism to the n-gram embeddings of a sentence to disambiguate the LU
given the projected semantic frame.

Week 10:
- Obtain the SegRNN model from https://github.com/swabhs/open-sesame.
- Create the attention mechanism using https://github.com/thomlake/pytorch-attention and train it on the annotated sentences. Augment the SegRNN model with the trained attention mechanism.
- Apply the augmented SegRNN on the unannotated sentences to label the semantic roles.

Week 11:
- Use the Python evaluation script from Week 3-4 to evaluate the LU, semantic frames, and frame elements projections.
- Discuss and analyze the result with mentors.
- Document the codes and result discussion for GSoC Final Evaluation in Week 13.

Week 12:
- Buffer Week
- (Required) Apply the best frame and frame elements projection models to the unannotated datasets.
- (Stretch Goal) Align sentences for EN-JP, EN-FR, EN-UR, and EN-HI (See Section 5.4 and 6.2).
