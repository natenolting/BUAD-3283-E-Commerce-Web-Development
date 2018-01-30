<?php

namespace Helpers\Generate;

class GenerateCourseSchedule extends GenerateCourseFiles implements GenerateFilesInterface
{
    protected $prefix = 'course_schedule';
    protected $description = "TBA
    \n\n####Notes:
    \n\nSee [course_notes/course_notes{{ suffix }}{{fileExtension}}]({{ remote }}/blob/{{ branch }}/course_notes/course_notes{{ suffix }}{{fileExtension}})
    \n\n####Assignment:
    \n\nSee [course_assignment/course_assignment{{ suffix }}{{fileExtension}}]({{ remote }}/blob/{{ branch }}/course_assignment/course_assignment{{ suffix }}{{fileExtension}})";
}