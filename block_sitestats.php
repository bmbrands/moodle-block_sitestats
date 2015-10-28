<?php
// This file is part of the my modules block
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * Language file for block "sitestats"
 *
 * @package    block_sitestats
 * @copyright  2014 Bas Brands, www.basbrands.nl
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author     Bas Brands, basbrands.nl
 */

defined('MOODLE_INTERNAL') || die();


/**
 * Displays recent sitestats
 */
class block_sitestats extends block_base {

    public function init() {
        $this->title = get_string('pluginname', 'block_sitestats');
    }

    public function instance_allow_multiple() {
        return true;
    }

    public function has_config() {
        return true;
    }

    public function hide_header() {
        $config = get_config('block_sitestats');
        if (isset($config->hideblockheader) && $config->hideblockheader == 1) {
            return true;
        } else {
            return false;
        }
        
    }

    public function instance_allow_config() {
        return true;
    }

    public function applicable_formats() {
        return array(
                'admin' => false,
                'site-index' => true,
                'course-view' => false,
                'mod' => false,
                'my' => false
        );
    }

    public function specialization() {
        if (empty($this->config->title)) {
            $this->title = get_string('pluginname', 'block_sitestats');
        } else {
            $this->title = $this->config->title;
        }
    }

    public function get_content() {
        global $PAGE, $CFG, $DB;

        if ($this->content !== null) {
            return $this->content;
        }

        $this->config->questioncount += count($DB->get_records('question'));
        
        $videos = count($DB->get_records('webvideo_store'));
        $this->config->videocount += $videos;

        $sql = "SELECT sum(viewcount) as views FROM {webvideo_views}";
        $totalviews = $DB->get_record_sql($sql);
        $this->config->viewcount += $totalviews->views;

        // Create empty content.
        $this->content = new stdClass();
        $this->content->text = '';


        $courseid = $this->page->course->id;
        if ($courseid == SITEID) {
            $courseid = null;
        }

        $renderer = $this->page->get_renderer('block_sitestats');
        $this->content->text .= html_writer::start_tag('div', array('class' => 'container-fluid'));
        $this->content->text .= html_writer::start_tag('div', array('class' => 'text-center'));
        $this->content->text .= html_writer::tag('h2', get_string('header', 'block_sitestats'));

        $this->content->text .= '<hr class="star-primary">';
        $this->content->text .= html_writer::end_tag('div');
        $this->content->text .= $renderer->statistics($this->config);
        $this->content->text .= html_writer::end_tag('div');
        

        return $this->content;
    }
}
