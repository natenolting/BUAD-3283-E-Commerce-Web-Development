#!/usr/bin/env bash
# generate the schedule files if needed
php helpers/GenerateCourseSchedule.php 2018-01-09 2018-04-24 2,4 >/dev/null
# combine syllabus file
php helpers/CombineSyllabus.php >/dev/null
# generate the TOC
node_modules/.bin/markdown-toc -i --maxdepth 3 syllabus.md
# copy over the content from course_syllabus.md to README.md
cat syllabus.md > README.md
