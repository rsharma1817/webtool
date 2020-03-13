<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:29 +0000.
 */

namespace App\Models\Base;

use Tightenco\Collect\Support\Collection;

/**
 * Class Entity
 * 
 * @property int $idEntity
 * @property string $entry
 * @property int $idOld
 * @property int $idColor
 * 
 * @property \App\Models\Color $color
 * @property Collection $annotationSet
 * @property Collection $c5Node
 * @property Collection $concept
 * @property Collection $constraintInstance
 * @property Collection $constraintType
 * @property Collection $construction
 * @property Collection $constructionElement
 * @property Collection $corpus
 * @property Collection $document
 * @property Collection $domain
 * @property Collection $entityRelation
 * @property Collection $frame
 * @property Collection $frameElement
 * @property Collection $genericLabel
 * @property Collection $genre
 * @property Collection $genreType
 * @property Collection $label
 * @property Collection $layer
 * @property Collection $layerType
 * @property Collection $lemma
 * @property Collection $lexeme
 * @property Collection $lu
 * @property Collection $mmAnnotationSet
 * @property Collection $pos
 * @property Collection $property
 * @property Collection $qualia
 * @property Collection $relationGroup
 * @property Collection $relationType
 * @property Collection $semanticType
 * @property Collection $sentence
 * @property Collection $subcorpus
 * @property Collection $template
 * @property Collection $templateElement
 * @property Collection $timeline
 * @property Collection $type
 * @property Collection $typeInstance
 * @property Collection $udFeature
 * @property Collection $udPos
 * @property Collection $udRelation
 * @property Collection $wordform
 * @property Collection $Domain
 *
 * @package App\Models\Base
 */

class Entity extends \MBusinessModel
{
	public int $idEntity; 
	public string $entry = '';
	public int $idOld; 
	public int $idColor; 
	public \App\Models\Color $color; 
	public Collection $annotationSet; 
	public Collection $c5Node; 
	public Collection $concept; 
	public Collection $constraintInstance; 
	public Collection $constraintType; 
	public Collection $construction; 
	public Collection $constructionElement; 
	public Collection $corpus; 
	public Collection $document; 
	public Collection $domain; 
	public Collection $entityRelation; 
	public Collection $frame; 
	public Collection $frameElement; 
	public Collection $genericLabel; 
	public Collection $genre; 
	public Collection $genreType; 
	public Collection $label; 
	public Collection $layer; 
	public Collection $layerType; 
	public Collection $lemma; 
	public Collection $lexeme; 
	public Collection $lu; 
	public Collection $mmAnnotationSet; 
	public Collection $pos; 
	public Collection $property; 
	public Collection $qualia; 
	public Collection $relationGroup; 
	public Collection $relationType; 
	public Collection $semanticType; 
	public Collection $sentence; 
	public Collection $subcorpus; 
	public Collection $template; 
	public Collection $templateElement; 
	public Collection $timeline; 
	public Collection $type; 
	public Collection $typeInstance; 
	public Collection $udFeature; 
	public Collection $udPos; 
	public Collection $udRelation; 
	public Collection $wordform; 
	public Collection $Domain; 

	public function color()
	{
		return $this->color ?: $this->retrieveAssociation('color'); 
	}

	public function annotationSet()
	{
		return $this->annotationSet ?: $this->retrieveAssociation('annotationSet'); 
	}

	public function c5Node()
	{
		return $this->c5Node ?: $this->retrieveAssociation('c5Node'); 
	}

	public function concept()
	{
		return $this->concept ?: $this->retrieveAssociation('concept'); 
	}

	public function constraintInstance()
	{
		return $this->constraintInstance ?: $this->retrieveAssociation('constraintInstance'); 
	}

	public function constraintType()
	{
		return $this->constraintType ?: $this->retrieveAssociation('constraintType'); 
	}

	public function construction()
	{
		return $this->construction ?: $this->retrieveAssociation('construction'); 
	}

	public function constructionElement()
	{
		return $this->constructionElement ?: $this->retrieveAssociation('constructionElement'); 
	}

	public function corpus()
	{
		return $this->corpus ?: $this->retrieveAssociation('corpus'); 
	}

	public function document()
	{
		return $this->document ?: $this->retrieveAssociation('document'); 
	}

	public function domain()
	{
		return $this->domain ?: $this->retrieveAssociation('domain'); 
	}

	public function entityRelation()
	{
		return $this->entityRelation ?: $this->retrieveAssociation('entityRelation'); 
	}

	public function entry()
	{
		return $this->entry ?: $this->retrieveAssociation('entry'); 
	}

	public function frame()
	{
		return $this->frame ?: $this->retrieveAssociation('frame'); 
	}

	public function frameElement()
	{
		return $this->frameElement ?: $this->retrieveAssociation('frameElement'); 
	}

	public function genericLabel()
	{
		return $this->genericLabel ?: $this->retrieveAssociation('genericLabel'); 
	}

	public function genre()
	{
		return $this->genre ?: $this->retrieveAssociation('genre'); 
	}

	public function genreType()
	{
		return $this->genreType ?: $this->retrieveAssociation('genreType'); 
	}

	public function label()
	{
		return $this->label ?: $this->retrieveAssociation('label'); 
	}

	public function layer()
	{
		return $this->layer ?: $this->retrieveAssociation('layer'); 
	}

	public function layerType()
	{
		return $this->layerType ?: $this->retrieveAssociation('layerType'); 
	}

	public function lemma()
	{
		return $this->lemma ?: $this->retrieveAssociation('lemma'); 
	}

	public function lexeme()
	{
		return $this->lexeme ?: $this->retrieveAssociation('lexeme'); 
	}

	public function lu()
	{
		return $this->lu ?: $this->retrieveAssociation('lu'); 
	}

	public function mmAnnotationSet()
	{
		return $this->mmAnnotationSet ?: $this->retrieveAssociation('mmAnnotationSet'); 
	}

	public function pos()
	{
		return $this->pos ?: $this->retrieveAssociation('pos'); 
	}

	public function property()
	{
		return $this->property ?: $this->retrieveAssociation('property'); 
	}

	public function qualia()
	{
		return $this->qualia ?: $this->retrieveAssociation('qualia'); 
	}

	public function relationGroup()
	{
		return $this->relationGroup ?: $this->retrieveAssociation('relationGroup'); 
	}

	public function relationType()
	{
		return $this->relationType ?: $this->retrieveAssociation('relationType'); 
	}

	public function semanticType()
	{
		return $this->semanticType ?: $this->retrieveAssociation('semanticType'); 
	}

	public function sentence()
	{
		return $this->sentence ?: $this->retrieveAssociation('sentence'); 
	}

	public function subcorpus()
	{
		return $this->subcorpus ?: $this->retrieveAssociation('subcorpus'); 
	}

	public function template()
	{
		return $this->template ?: $this->retrieveAssociation('template'); 
	}

	public function templateElement()
	{
		return $this->templateElement ?: $this->retrieveAssociation('templateElement'); 
	}

	public function timeline()
	{
		return $this->timeline ?: $this->retrieveAssociation('timeline'); 
	}

	public function type()
	{
		return $this->type ?: $this->retrieveAssociation('type'); 
	}

	public function typeInstance()
	{
		return $this->typeInstance ?: $this->retrieveAssociation('typeInstance'); 
	}

	public function udFeature()
	{
		return $this->udFeature ?: $this->retrieveAssociation('udFeature'); 
	}

	public function udPos()
	{
		return $this->udPos ?: $this->retrieveAssociation('udPos'); 
	}

	public function udRelation()
	{
		return $this->udRelation ?: $this->retrieveAssociation('udRelation'); 
	}

	public function wordform()
	{
		return $this->wordform ?: $this->retrieveAssociation('wordform'); 
	}

}
