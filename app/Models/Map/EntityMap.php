<?php

/**
 * Created by Reliese Model.
 * Date: Tue, 14 Jan 2020 23:25:29 +0000.
 */

namespace App\Models\Map;

class EntityMap
{
	public static $ORMMap = [
		'class' => '\\App\\Models\\Entity',
		'table' => 'entity',
		'primaryKey' => 'idEntity',
		'attributes' => [
			'idEntity' => [
				'column' => 'idEntity',
				'idgenerator' => 'identity',
				'type' => 'int'
			],
			'entry' => [
				'column' => 'entry',
				'type' => 'string'
			],
			'idOld' => [
				'column' => 'idOld',
				'type' => 'int'
			],
			'idColor' => [
				'column' => 'idColor',
				'type' => 'int'
			]
		],
		'associations' => [
			'color' => [
				'toClass' => '\\App\\Models\\Color',
				'cardinality' => 'oneToOne',
				'keys' => 'idColor:idColor'
			],
			'annotationSet' => [
				'toClass' => '\\App\\Models\\AnnotationSet',
				'cardinality' => 'oneToMany',
				'keys' => 'idEntity:idEntity'
			],
			'c5Node' => [
				'toClass' => '\\App\\Models\\C5Node',
				'cardinality' => 'oneToMany',
				'keys' => 'idEntity:idEntity'
			],
			'concept' => [
				'toClass' => '\\App\\Models\\Concept',
				'cardinality' => 'oneToMany',
				'keys' => 'idEntity:idEntity'
			],
			'constraintInstance' => [
				'toClass' => '\\App\\Models\\ConstraintInstance',
				'cardinality' => 'oneToMany',
				'keys' => 'idConstraint:idConstraint'
			],
			'constraintType' => [
				'toClass' => '\\App\\Models\\ConstraintType',
				'cardinality' => 'oneToMany',
				'keys' => 'idEntity:idEntity'
			],
			'construction' => [
				'toClass' => '\\App\\Models\\Construction',
				'cardinality' => 'oneToMany',
				'keys' => 'idEntity:idEntity'
			],
			'constructionElement' => [
				'toClass' => '\\App\\Models\\ConstructionElement',
				'cardinality' => 'oneToMany',
				'keys' => 'idEntity:idEntity'
			],
			'corpus' => [
				'toClass' => '\\App\\Models\\Corpus',
				'cardinality' => 'oneToMany',
				'keys' => 'idEntity:idEntity'
			],
			'document' => [
				'toClass' => '\\App\\Models\\Document',
				'cardinality' => 'oneToMany',
				'keys' => 'idEntity:idEntity'
			],
			'domain' => [
				'toClass' => '\\App\\Models\\Domain',
				'cardinality' => 'manyToMany',
				'associative' => 'entity_domain'
			],
			'entityRelation' => [
				'toClass' => '\\App\\Models\\EntityRelation',
				'cardinality' => 'oneToMany',
				'keys' => 'idEntity3:idEntity3'
			],
			'entry' => [
				'toClass' => '\\App\\Models\\Entry',
				'cardinality' => 'oneToMany',
				'keys' => 'idEntity:idEntity'
			],
			'frame' => [
				'toClass' => '\\App\\Models\\Frame',
				'cardinality' => 'oneToMany',
				'keys' => 'idEntity:idEntity'
			],
			'frameElement' => [
				'toClass' => '\\App\\Models\\FrameElement',
				'cardinality' => 'oneToMany',
				'keys' => 'idEntity:idEntity'
			],
			'genericLabel' => [
				'toClass' => '\\App\\Models\\GenericLabel',
				'cardinality' => 'oneToMany',
				'keys' => 'idEntity:idEntity'
			],
			'genre' => [
				'toClass' => '\\App\\Models\\Genre',
				'cardinality' => 'oneToMany',
				'keys' => 'idEntity:idEntity'
			],
			'genreType' => [
				'toClass' => '\\App\\Models\\GenreType',
				'cardinality' => 'oneToMany',
				'keys' => 'idEntity:idEntity'
			],
			'label' => [
				'toClass' => '\\App\\Models\\Label',
				'cardinality' => 'oneToMany',
				'keys' => 'idLabelType:idLabelType'
			],
			'layer' => [
				'toClass' => '\\App\\Models\\Layer',
				'cardinality' => 'oneToMany',
				'keys' => 'idEntity:idEntity'
			],
			'layerType' => [
				'toClass' => '\\App\\Models\\LayerType',
				'cardinality' => 'oneToMany',
				'keys' => 'idEntity:idEntity'
			],
			'lemma' => [
				'toClass' => '\\App\\Models\\Lemma',
				'cardinality' => 'oneToMany',
				'keys' => 'idEntity:idEntity'
			],
			'lexeme' => [
				'toClass' => '\\App\\Models\\Lexeme',
				'cardinality' => 'oneToMany',
				'keys' => 'idEntity:idEntity'
			],
			'lu' => [
				'toClass' => '\\App\\Models\\Lu',
				'cardinality' => 'oneToMany',
				'keys' => 'idEntity:idEntity'
			],
			'mmAnnotationSet' => [
				'toClass' => '\\App\\Models\\MmAnnotationSet',
				'cardinality' => 'oneToMany',
				'keys' => 'idEntity:idEntity'
			],
			'pos' => [
				'toClass' => '\\App\\Models\\Pos',
				'cardinality' => 'oneToMany',
				'keys' => 'idEntity:idEntity'
			],
			'property' => [
				'toClass' => '\\App\\Models\\Property',
				'cardinality' => 'oneToMany',
				'keys' => 'idEntity:idEntity'
			],
			'qualia' => [
				'toClass' => '\\App\\Models\\Qualia',
				'cardinality' => 'oneToMany',
				'keys' => 'idEntity:idEntity'
			],
			'relationGroup' => [
				'toClass' => '\\App\\Models\\RelationGroup',
				'cardinality' => 'oneToMany',
				'keys' => 'idEntity:idEntity'
			],
			'relationType' => [
				'toClass' => '\\App\\Models\\RelationType',
				'cardinality' => 'oneToMany',
				'keys' => 'idEntity:idEntity'
			],
			'semanticType' => [
				'toClass' => '\\App\\Models\\SemanticType',
				'cardinality' => 'oneToMany',
				'keys' => 'idEntity:idEntity'
			],
			'sentence' => [
				'toClass' => '\\App\\Models\\Sentence',
				'cardinality' => 'oneToMany',
				'keys' => 'idEntity:idEntity'
			],
			'subcorpus' => [
				'toClass' => '\\App\\Models\\Subcorpus',
				'cardinality' => 'oneToMany',
				'keys' => 'idEntity:idEntity'
			],
			'template' => [
				'toClass' => '\\App\\Models\\Template',
				'cardinality' => 'oneToMany',
				'keys' => 'idEntity:idEntity'
			],
			'templateElement' => [
				'toClass' => '\\App\\Models\\TemplateElement',
				'cardinality' => 'oneToMany',
				'keys' => 'idEntity:idEntity'
			],
			'timeline' => [
				'toClass' => '\\App\\Models\\Timeline',
				'cardinality' => 'oneToMany',
				'keys' => 'idEntity:idEntity'
			],
			'type' => [
				'toClass' => '\\App\\Models\\Type',
				'cardinality' => 'oneToMany',
				'keys' => 'idEntity:idEntity'
			],
			'typeInstance' => [
				'toClass' => '\\App\\Models\\TypeInstance',
				'cardinality' => 'oneToMany',
				'keys' => 'idEntity:idEntity'
			],
			'udFeature' => [
				'toClass' => '\\App\\Models\\UdFeature',
				'cardinality' => 'oneToMany',
				'keys' => 'idEntity:idEntity'
			],
			'udPos' => [
				'toClass' => '\\App\\Models\\UdPos',
				'cardinality' => 'oneToMany',
				'keys' => 'idEntity:idEntity'
			],
			'udRelation' => [
				'toClass' => '\\App\\Models\\UdRelation',
				'cardinality' => 'oneToMany',
				'keys' => 'idEntity:idEntity'
			],
			'wordform' => [
				'toClass' => '\\App\\Models\\Wordform',
				'cardinality' => 'oneToMany',
				'keys' => 'idEntity:idEntity'
			]
		]
	];
}
