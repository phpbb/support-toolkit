#!/bin/sh
#
# Build script for the Support Toolkit
# $Id$
#
# Settings
revision=
version=""

# Some aditional vars. These can be changed.
destdir=~/Desktop/
packagename="Support Toolkit-$version"
repo="trunk"
tmpdir=/tmp/

# Move to tmp
cd $tmpdir

# Checkout
echo "This script will build the STK $version packages from revision $revision."
echo "Checking out revision"
svn export -qr "$revision" http://code.phpbb.com/svn/support-toolkit/$repo/ "$packagename"

# Set the location of the exclude.lst file
exclude="$tmpdir$packagename/stk/build/exclude.lst"

# Zip
echo "Creating $packagename.zip"
zip -qr "$packagename".zip "$packagename" --exclude @"$exclude"

# Since we use the CDB we don't release *.tar.bz2 archives anymore
# tar.bz2
#echo "Creating $packagename.tar.bz2"
#tar -cvjf "$packagename".tar.bz2 "$packagename" -X "$exclude" 1> /dev/null 2>&1

echo "Moving files to the Desktop"
mv "$packagename".* $destdir

# Delete the export
rm -rf $tmpdir"$packagename"

echo "Done!";