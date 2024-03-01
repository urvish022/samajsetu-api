<?php 
$theme = get_current_theme();
if(!$this->session->userdata('site_lang'))
  $lang = 'english';
else
  $lang = $this->session->userdata('site_lang');
 ?>

<div class="theme-panel hidden-xs hidden-sm">
                            <div class="toggler"> </div>
                            <div class="toggler-close"> </div>
                            <div class="theme-options">
                                <div class="theme-option theme-colors clearfix">
                                    <span> <?=$this->lang->line('theme_color'); ?> </span>
                                    <ul>
                                        <li class="color-default <?php if($theme == 'default') 
                                        echo "current"; ?> tooltips"  data-container="body" data-original-title="Default" onclick="change_theme('default')"> </li>
                                        <li class="color-darkblue <?php if($theme == 'darkblue') echo "current"; ?> tooltips"  data-style="darkblue" data-container="body" data-original-title="Dark Blue"
                                        onclick="change_theme('darkblue')"> </li>
                                        <li class="color-blue <?php if($theme == 'blue') echo "current"; ?> tooltips"  data-style="blue" data-container="body" data-original-title="Blue"
                                        onclick="change_theme('blue')"> </li>
                                        <li class="color-grey <?php if($theme == 'grey') echo "current"; ?> tooltips" data-style="grey" data-container="body" data-original-title="Grey"
                                        onclick="change_theme('grey')"> </li>
                                        <li class="color-light <?php if($theme == 'light') echo "current"; ?> tooltips"  data-style="light" data-container="body" data-original-title="Light"
                                        onclick="change_theme('light')"> </li>
                                        <li class="color-light2 <?php if($theme == 'light2') echo "current"; ?> tooltips"  data-style="light2" data-container="body" data-html="true" data-original-title="Light 2"
                                        onclick="change_theme('light2')"> </li>
                                    </ul>
                                </div>

                                <div class="theme-option">
                                    <span> <?=$this->lang->line('select_lang'); ?> </span>
                                    <select class="form-control input-sm" onchange="change_language(this.value)">
                                        <option value="english" <?php if($lang == 'english') 
                                        echo "selected='selected'";?> >English</option>
                                        <option value="gujarati" <?php if($lang == 'gujarati') 
                                        echo "selected='selected'";?> >Gujarati</option>
                                    </select>
                                </div>

                                 <div class="theme-option theme-colors clearfix">
                                    <span> <?=$this->lang->line('translator'); ?> </span>
                                    <form name="translate_form">
                                        <textarea class="form-control" autofocus="autofocus"  rows="5"  
                                        id="translator" cols="6" 
                                        style="width:290px;height:200px">
                                            
                                        </textarea><br>
                                        <button type="button" class="btn btn-default green" onclick="copy_text()">
										                    <?=$this->lang->line('copy_text'); ?>
                                        </button>&nbsp;
                                        <button type="reset" class="btn btn-default"><?=$this->lang->line('reset'); ?></button>
                                        
                                    </form>

                                 </div>
                            </div>
                        </div>