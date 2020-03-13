<?php


namespace App\Repositories;

use App\Models\Language as LanguageModel;

class LanguageRepository extends \MRepository
{
    public static function languages() {
        return LanguageModel::getCriteria()->select("idLanguage, language")->asQuery()->chunkResult('idLanguage', 'language');
    }

}