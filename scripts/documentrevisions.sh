#!/bin/sh
# Get size of .DocumentRevisions-V100

# Skip manual check
if [ "$1" = 'manualcheck' ]; then
	echo 'Manual check: skipping'
	exit 0
fi

# Create cache dir if it doesnt exist
DIR=$(dirname $0)
mkdir -p "$DIR/cache"

# Get size of .DocumentRevisions-V100
TOTAL=$(sudo /usr/bin/du -kcs /.DocumentRevisions-V100 | /usr/bin/sed '1d;' | /usr/bin/awk '{ print $1 }')
/bin/echo "$(( TOTAL/1024 )) MB" >"$DIR/cache/documentrevisions.txt"

exit 0


