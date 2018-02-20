<?php
/**
 * KenDB
 *
 * PHP versions 5
 *
 * @category  None
 * @package   None
 * @author    ryuzee <ryuzee@i-c-i.jp>
 * @copyright 2010 Tokyo Institute of Technology
 * @license   private http://www.titech.ac.jp/
 * @link      none
 */

/**
 * DatePickerHelper
 *
 * jquery.datePickerを呼び出すヘルパー
 *
 * @category  None
 * @package   None
 * @author    ryuzee <ryuzee@i-c-i.jp>
 * @copyright 2010 Tokyo Institute of Technology
 * @license   http://www.titech.ac.jp Private
 * @link      None
 */
class DatePickerHelper extends FormHelper {

    var $helpers = array('Html', 'Javascript');
    var $format = '%Y-%m-%d';

    /**
     * setup
     */
    function _setup() {
        $format = Configure::read('DatePicker.format');
        if ($format != null) {
            $this->format = $format;
        }
    }

    /**
     * 日付を選択する
     *
     * @param string $fieldName
     * @param array  $options
     * 
     * @return string
     */
    function picker($fieldName, $options = array()) {
        $this->_setup();
        $this->setEntity($fieldName);
        $htmlAttributes = $this->domId($options);
        $divOptions['class'] = 'date';
        $options['type'] = 'date';
        $options['div']['class'] = 'date';
        $options['dateFormat'] = 'YMD';
        $options['monthNames'] = false;
        ;
        $options['minYear'] = isset($options['minYear']) ? $options['minYear'] : (date('Y') - 10);
        $options['maxYear'] = isset($options['maxYear']) ? $options['maxYear'] : (date('Y') + 6);

        $options['after'] = $this->Html->image('calendar.png', array('id' => $htmlAttributes['id'], 'style' => 'cursor:pointer'));

        if (isset($options['empty'])) {
            $options['after'] .= $this->Html->image('b_drop.png', array('id' => $htmlAttributes['id'] . "_drop", 'style' => 'cursor:pointer'));
        }
        $output = $this->input($fieldName, $options);
        $output .= $this->Javascript->codeBlock(
                "datepick('" . $htmlAttributes['id'] . "','" .$options['minYear'] ."/01/01','" .$options['maxYear'] . "/12/31');"
        );
        $output .= '<span id="' . $htmlAttributes['id'] . '_str"></span>';
        return $output;
    }

}
?> 
