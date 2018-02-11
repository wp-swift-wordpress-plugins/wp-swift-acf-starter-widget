#!/bin/bash
RED='\033[0;31m'
GREEN='\033[0;32m'
NC='\033[0m' # No Color

# Read in the plugin name
echo -n "Enter plugin name : "
read plugin_name

# Read in the plugin name
echo -n "Enter plugin description : "
read plugin_description

# Convert spaces to underscores
plugin_name_underscores=${plugin_name// /_}  
# Apend underscore to start and end of string
plugin_name_underscores='_'$plugin_name_underscores'_'
# Convert string to lowercase
plugin_name_underscores_lowercase=$(tr '[:upper:]' '[:lower:]' <<< "$plugin_name_underscores")
# Convert underscores to dashes
plugin_name_dashes_lowercase=${plugin_name_underscores_lowercase//_/-}   

# _wp-swift-widget-function.php
sed -i '' "s/ACF Starter/$plugin_name/g" _wp-swift-widget-function.php
sed -i '' "s/_ACF_Starter_/$plugin_name_underscores/g" _wp-swift-widget-function.php
sed -i '' "s/_acf_starter_/$plugin_name_underscores_lowercase/g" _wp-swift-widget-function.php
sed -i '' "s/-acf-starter-/$plugin_name_dashes_lowercase/g" _wp-swift-widget-function.php
sed -i '' "s/A starter widget for creating widgets using Advanced Custom Fields/$plugin_description/g" _wp-swift-widget-function.php

# README.md
sed -i '' "s/ACF Starter/$plugin_name/g" README.md
sed -i '' "s/-acf-starter-/$plugin_name_dashes_lowercase/g" README.md
sed -i '' "s/A starter widget for creating widgets using Advanced Custom Fields/$plugin_description/g" README.md

# Output feedback
echo "\nReplacing the following strings in two files:\n"
# Read in the plugin name
echo "${RED}ACF Starter${NC}   		>>> 	" $GREEN$plugin_name$NC
# Convert spaces to underscores
echo "${RED}_ACF_Starter_${NC} 		>>> 	" $GREEN$plugin_name_underscores$NC
# Convert string to lowercase
echo "${RED}_acf_starter_${NC} 		>>> 	" $GREEN$plugin_name_underscores_lowercase$NC
# Convert underscores to dashes
echo "${RED}-acf-starter-${NC} 		>>> 	" $GREEN$plugin_name_dashes_lowercase$NC
# Update plugin_description
echo "${RED}A starter widget ...${NC}    >>> 	 $GREEN${plugin_description:0:20}...$NC"

echo "\nDone\n"