<?php

  # Calendar Version 4.0

  # IMPORTANT DATES for FALL 2018 (AY19)
  # Classes Begin       = Mon 20 AUG
  # 6wk Exams           = 24->28 Sep
  # 12wk Exams          = 29Oct->2Nov
  # Last day of classes = Thu 6 DEC
  # Exam Period         = 10-18 DEC

  # Override a specific day for things such as a different type
  # of class (exams, practicum, project, etc) or for the eventual
  # snow day or holiday, takes the format of
  # $OVERRIDE = array(MONTH# => array(DAY# => 'new type',
  #                                   DAY# => 'new type'),
  #                   MONTH# => array(DAY# => 'new type'));
  $OVERRIDE = array(9 =>array(3 =>'HOLIDAY', 4=>'monday schedule', 28=>'exam'),
                    10=>array(8 =>'HOLIDAY'),
                    11=>array(2 =>'exam', 12=>'HOLIDAY', 21=>'Friday Schedule', 22=>'HOLIDAY', 22=>'HOLIDAY'),
                    12=>array(6 =>'final class', 18=>'final exam'));

  # Combine specific days on the calendar, useful for those days where a lab becomes
  # a double class period...
  # Example: $COMBINE = array('class'=>array(3=>array('class', 'lab')));
  # This example above would add an additional class and lab to class #3
  $COMBINE = array();

  # When does this class start, and how long (months) is it?
  $MONTH_START = 8;
  $DAY_START = 20;
  $MONTH_END = 12;
  $YEAR = 2018;

  # What is the default schedule for this class
  # use 1-7 (as mon -> fri), or use 'mon', 'tue', 'wed', 'thu', 'fri', 'sat', 'sun'
  $DOW = array('mon'=>'class',
               'wed'=>'lab',
               'fri'=>'class');

  # Set the Course Number
  $COURSE = 'SI123';

  # Set the Descriptive Name of the course
  $COURSENAME = 'Applied Something';

  # Set Defaults Titles for the pages (easily overriden by changing these in the pages)
  $PAGE_TITLE = "$COURSE (Fall $YEAR)";

  # Dynamically change content within a page based on these variables
  # This will use the <replace value="tag">  with the value in $PAGE_MODIFY
  $PAGE_MODIFY = array('classyear'=>'19',
                       'course'=>$COURSE,
                       'server'=>'midn.cs.usna.edu',
                       'servershort'=>'midn');

  # Custom CSS, by default the CSS has already been configured for the
  # calendar system (and is embedded within the calendar-core repo)
  # If you would like to use your own CSS provide the information
  // $CUSTOMCSS = array('class'=>array('docs/custom1.css', 'docs/custom2.css'));

  # By default the system only highlights classes and labs on the navbar
  # modify the following to change this.
  # Selection of Glyphicons can be found at https://getbootstrap.com/docs/3.3/components/
  $NAVBAR_DROPDOWNS = array('class' => 'glyphicon-apple',
                            'lab' => 'glyphicon-knight');

  # If you want the instructor to have different menus
  $NAVBAR_DROPDOWNS_INSTRUCTOR = array('class' => 'glyphicon-apple',
                            'lab' => 'glyphicon-knight',
                            'exam' => 'glyphicon-hourglass');

  # Show Weekends
  $WEEKENDS = False;

  # Access Log, if you would like to keep a history of accesses to your
  # system, provide a filename, otherwise leave this unset
  # Make sure that the web user can write to the root of this directory
  # and can write to this file
  // $ACCESS_LOG = 'access.log';

  # Admin password to override hidden-ness!  This will allow you to see all files,
  # including those not linked, and those that have time delayed availability
  $ADMIN = 'mypassword';

  # By Default, the instructor stays logged on for 12 hours (43200 seconds)
  # This can be overriden if you want a longer or shorter period.
  // $LOGON_TIME = 43200;

  # The secret makes it harder for someone to set the SESSION Variables
  # To gain access without knowing the password...  This is used by the
  # authenticator
  $SECRET = 'A really long phrase that should be impossible to guess, you dont need to remember this...';

  # Default start page, set to true to automatically show the current days
  # lecture.  Otherwise the standard homepage will be shown.
  $DEFAULT_TODAYS_LECTURE = False;

  # Use a list view as a calendar instead of the traditional montly calendar
  #$CALENDAR_TOOL = 'calendar_display_alt';

  # Unlock a file for viewing by naming the file xxxx.MONTH.DAY.ext, OR
  # By placing that information into consilidated into a single file
  # -> CONTENTS LIKE:
  # homework/homework01<tab>month<tab>day
  $ACCESS_FILE = 'virtual/cal4.access';

  # Place a file into a directory virtually using a config file
  # -> CONTENTS LIKE:
  # notes.html<tab>homework/homework01.html<tab>COMPONENT<tab>eventNumber
  # -> Where COMPONENT based off of $DOW or $OVERIDE (values like class, lab, etc)
  $CLASS_FILE = 'virtual/cal4.virtual';

  # What information do you want shown in each day box on the calendar
  # Items that aren't found for that day are ignored.
  $BOX = array(0 => 'title',
               1 => 'instructor',
               2 => 'reading',
               3 => 'notes',
               4 => 'lab-solution',
               5 => 'homework',
               6 => 'homework-solution');

  # For the items that appear in a box, what is their source

  # Which items from the box should be processed as html,
  # The difference being that with a link the users is redirected,
  # with the $HTML option the css will survive.
  # Note: This has higher precedence over $LINK
  $HTML = array('title' => 'index.html',
                'homework' => 'homework.html',
                'reading' => 'reading.html',
                'notes' => 'notes.html',
                'homework-solution' => 'answers.html',
                'lab-solution' => 'labanswers.html',
                'instructor' => 'instructor.html');

  # Which items from the box should cause html linking.
  $LINK = array('title' => 'lindex.html',
                'homework' => 'lhomework.html',
                'reading' => 'lreading.html',
                'notes' => 'lnotes.html',
                'lab-solution' => 'llabanswers.html',
                'homework-solution' => 'lanswers.html');

  # Which items should be handled as pdfs,
  $PDF = array('title' => 'slides.pdf',
               'homework' => 'homework.pdf',
               'reading' => 'reading.pdf',
               'homework-solution' => 'answers.pdf',
               'lab-solution' => 'labanswers.pdf',
               'instructor' => 'instructor.pdf');

  # Which items should be handled as slides,
  $PPT = array('title' => 'slides.pptx',
               'homework' => 'homework.pptx',
               'reading' => 'reading.pptx',
               'homework-solution' => 'answers.pptx',
               'lab-solution' => 'labanswers.pptx',
               'instructor' => 'instructor.pptx');

  # These items will be cut and pasted into that part of the box
  # so a good place to put one liners.  Note: only the first line
  # of the file will be used, the rest will be ignored (or used as
  # instructor notes), this is a carryover from the designs of
  # calendar V1 and V2.
  $SRC = array('homework' => 'homework.txt',
               'reading' => 'reading.txt',
               'notes' => 'notes.txt',
               'homework-solution' => 'answers.txt',
               'instructor' => 'instructor.txt');

  # Ignore the HTML5 <a name> warnings.
  $IGNORE_A_TAG_WARNING = True;

  # Run the main calendar script
  # Don't remove this line
  require_once('calendar/calendar_main.php');

?>
