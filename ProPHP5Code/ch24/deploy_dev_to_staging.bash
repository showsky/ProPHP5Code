#!/bin/bash
rsync –avrz –e ssh /home/widgets/staging/* widgets@staging.widgets.com:/home/widgets/staging