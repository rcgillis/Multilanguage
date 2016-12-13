<?php

class MultilanguageContentLanguage extends Omeka_Record_AbstractRecord
{
    public $record_type;

    public $record_id;

    public $lang;

    public static function lang($recordType, $recordId)
    {
        $table = get_db()->getTable('MultilanguageContentLanguage');
        $params = array('record_type' => $recordType,
                  'record_id'   => $recordId,
                );
        $select = $table->getSelectForFindBy($params);

        $record = $table->fetchObject($select);
        if ($record) {
            return $record->lang;
        } else {
            $defaultCode = Zend_Registry::get('bootstrap')
                ->getResource('Config')->locale->name;
            return $defaultCode;
        }
    }
}
