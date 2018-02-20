<?php
class I18nSourceGenShell extends Shell {
    var $uses = array("Researcher", "Entrust", "NedoJstOther", "Grant", "Contract",
        "User", "EditStatus", "SelectableItem", "Role", "Donation", "Encourage",
        "Project", "Obligation", "OtherResearchGrant", "MhlwResearchGrant",
        "Adoption", "AssessedContribution");
    var $actions = array("index", "add", "edit", "view", "delete", "output_excel", "start", "finish", "json",
        "search_box", "login", "logout", "upload", "restore", "copy", "edit_node", "history_view", "add_node", 
        "admin_index", "admin_add", "admin_edit", "admin_view", "admin_delete",
        );

    function main()
    {
        $i18source = array();

        foreach ($this->uses as $model) {
            $types = $this->$model->getColumnTypes();
            foreach ($types as $k => $v) {
                $i18nsource[] = $k;
            }
        }
        $i18nsource = array_unique($i18nsource);
        $contents = array();
        foreach ($i18nsource as $item) {
            $contents[] = "<?php echo __('" . Inflector::humanize($item) . "', true ); ?>\n";
        }

        foreach($this->uses as $str) {
            $contents[] = "<?php echo __('" . $str . "', true ); ?>\n";
        }

        foreach($this->uses as $str) {
            $contents[] = "<?php echo __('" . Inflector::pluralize($str) . "', true ); ?>\n";
        }


        foreach($this->actions as $str) {
            $contents[] = "<?php echo __('" . $str . "', true ); ?>\n";
        }
        
        $filename = dirname(__FILE__) . "/" . "i18n_auto.php";
        file_put_contents($filename, $contents, FILE_TEXT);
    }
}
?>
