#!/usr/bin/env bash
# generate the schedule files if needed and combine syllabus files
# make schedule from 2018-01-09 to 2018-04-24 on the 2nd and 4th day of the week
# like ['2018-01-09','2018-04-24','2,4', pwd]
php -r "require_once __DIR__ . '/vendor/autoload.php'; \$schedule= new \\Helpers\\Generate\\GenerateCourseSchedule(['2018-01-09','2018-04-24','2,4', exec('pwd')]); \$schedule->generate();" \
&& php -r "require_once __DIR__ . '/vendor/autoload.php'; \$assignments= new \\Helpers\\Generate\\GenerateCourseAssignment(['2018-01-09','2018-04-24','2,4', exec('pwd')]); \$assignments->generate();" \
&& php -r "require_once __DIR__ . '/vendor/autoload.php';  \$syllabus= new \\Helpers\\Generate\\GenerateSyllabus(['directory' => exec('pwd')]); \$syllabus->generate();"
# generate the TOC
node_modules/.bin/markdown-toc -i --maxdepth 3 syllabus.md
# copy over the content from course_syllabus.md to README.md
cat syllabus.md > README.md
