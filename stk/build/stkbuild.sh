#!/bin/sh
#
# Build script for the Support Toolkit
# $Id$
#
# Settings
revision="333"
version="1.0.0-pl2"

# vars
repo="trunk"
file="Support Toolkit-$version"
destfile="~/Desktop/Support Toolkit-$version.zip"

# Move to tmp
cd /tmp/

# Checkout
echo "This script will build the STK $version packages from revision $revision."
echo "Checking out revision"
svn export -qr "$revision" http://code.phpbb.com/svn/support-toolkit/"$repo"/ "$file"

# Zip
echo "Creating $file.zip"
zip -qr "$file".zip "$file" -x "*develop*" "*build*"

# tar.bz2
echo "Creating $file.tar.bz2"
tar -cvjf "$file".tar.bz2 "$file" --exclude "develop" "build" 1> /dev/null 2>&1

echo "Moving files to the Desktop"
mv "$file".* ~/Desktop