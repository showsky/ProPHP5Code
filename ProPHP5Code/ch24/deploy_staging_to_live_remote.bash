#!/bin/bash
rsync –avrz –e ssh /home/widgets/staging/* widgets@web01:/home/widgets/live
rsync –avrz –e ssh /home/widgets/staging/* widgets@web02:/home/widgets/live
rsync –avrz –e ssh /home/widgets/staging/* widgets@web03:/home/widgets/live
