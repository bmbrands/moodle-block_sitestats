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
 *
 * @package    block_sitestats
 * @copyright  2014 Bas Brands, www.basbrands.nl
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 * @author     Bas Brands, basbrands.nl
 */

defined('MOODLE_INTERNAL') || die();

class block_sitestats_renderer extends plugin_renderer_base {


    public function statistics($statistics) {

        $output = '
        <div class="statistics">
            <div id="pie-charts" class="row ">
                <div class="m-b-20 col-sm-4">
                    <div class="clearfix"></div>
                    <div class="text-center ">
                        <div class="easy-pie main-pie p-b-25" >
                            <div class="percent counter">'.$statistics->videocount.'</div>
                            
                            <div class="circle"></div>
                        </div>
                        <div>Number of Videos</div>
                    </div>
                </div>

                <div class="m-b-20 col-sm-4">
                    <div class="clearfix"></div>
                    <div class="text-center">
                        <div class="easy-pie main-pie p-b-25" >
                            <div class="percent counter">'.$statistics->viewcount.'</div>
                            <div class="circle"></div>
                        </div>
                        <div>Number of views</div>
                    </div>
                </div>

                <div class="m-b-20 col-sm-4">
                    <div class="clearfix"></div>
                    <div class="text-center">
                        <div class="easy-pie main-pie p-b-25" >
                            <div class="percent counter">'.$statistics->questioncount.'</div>
                            <div class="circle"></div>
                        </div>
                        <div>Number of Questions</div>
                    </div>
                </div>
            </div>
        </div>';
        return $output;
    }

}

