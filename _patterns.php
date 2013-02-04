<!DOCTYPE html><html lang="en-gb">

<head>
    <title>Pattern Primer - Barebones</title>
    <meta charset="utf-8"/>
    <link rel="stylesheet" href="_css/reset.css" type="text/css"/>
    <link rel="stylesheet" href="_css/patterns.css" type="text/css"/>
    <style>
        .pattern {
            margin-top:4em;
        }
        details.primer {
            margin-top:2.5em;
            background-color:#e9e9e9;
            border-bottom:4px solid #e9e9e9;
            position:relative;
        }
        details.primer summary {
            font-size:1.5em;
            line-height:1;
            text-shadow:0 1px 0 #fff;
            background-color:#e9e9e9;
            border-radius:0.25em 0 0 0;
            padding:0.25em;
            overflow:hidden;
            position:absolute;
            right:0;
            top:-1.5em;
            }
            details.primer summary::-webkit-details-marker {
                display:none;
            }
        details.primer section {
            padding:1.5%;
            overflow:hidden;
        }
        details.primer textarea {
            font:0.75em/1.5 'DejaVu Sans Mono',Inconsolata,Consolas,'Lucida Console',monospace; /* 16px/24px */
        }
        details.primer textarea {
            padding:1%;
            width:98%;
        }
        details.primer p.caption {
            margin-left:0;
            margin-bottom:0;
        }
        @media screen and (min-width:40em) {
            details.primer textarea {
                width:58%;
                float:left;
            }
            details.primer p.caption {
                width:38%;
                float:right;
            }
        }
    </style>
</head>

<body>
    <header>
        <nav role="navigation" class="breadcrumb-nav">
            <a href="/">Barebones</a> /
        </nav><!--/.breadcrumb-nav-->
        <h1>Pattern Primer</h1>
        <p class="lede">Common snippets of markup used throughout this site.</p>
    </header>

<?php
    $files = array();
    $patterns_dir = "_patterns";
    $handle = opendir($patterns_dir);
    while (false !== ($file = readdir($handle))):
        if(stristr($file,'.html')):
            $files[] = $file;
        endif;
    endwhile;
    rsort($files);
    foreach ($files as $file):
        echo '<section class="pattern">';
        include($patterns_dir.'/'.$file);
        echo '<details class="primer">';
        echo '<summary title="Show markup and usage">&#8226;&#8226;&#8226;</summary>';
        echo '<section>';
        echo '<textarea rows="10" cols="30" class="input">'.htmlspecialchars(file_get_contents($patterns_dir.'/'.$file)).'</textarea>';
        echo '<p class="caption"><strong>Usage:</strong> '.htmlspecialchars(file_get_contents($patterns_dir.'/'.str_replace('.html','.txt',$file))).'</p>';
        echo '</section>';
        echo '</details><!--/.primer-->';
        echo '</section><!--/.pattern-->';
    endforeach;
?>

    <footer role="contentinfo">
        <p><small>Copyright &#169; 2012 Paul Robert Lloyd. Code covered by the <a rel="license" href="http://paulrobertlloyd.mit-license.org/">MIT license</a>.</small></p>
    </footer><!--/.contentinfo-->
</body>
</html>