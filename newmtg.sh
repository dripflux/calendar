#!/bin/bash

# Course: General Course
# Role: Course Coordinator
# Author: LCDR C. W. Hoffmeister
# Description: bash script to setup material for a meeting

dir=class/  # Default to class directory

# Displays script usage information
function usage () {
	echo "usage: newmtg <meeting type> <meeting name>"
	echo "Note: Script designed to use calendar-core project (see https://github.com/jskenney/calendar-core)"
	echo "  meeting types: { class, exam, info, lab, quiz, resources, review }"
	if [ -d calendar-core ] ; then
		echo "  meeting name: Use calendar-core project naming convention"
	else
		echo "  meeting name: (it's your jeep)"
	fi

}

# Copy core type specified files to target directory
function copyCoreFiles () {
	if [ -f .index-template.html ] && [ ! -f "${1}/index.html" ] ; then  # Meeting template
		cp .index-template.html "${1}/index.html"
	fi
	if [ -f .learnOuts-template.html ] && [ ! -f "${1}/learnOuts.html" ] ; then  # Meeting template
		cp .learnOuts-template.html "${1}/learnOuts.html"
	fi
}

# Copy example files to target directory
function copyExampleFiles () {
	if (( ${#} == 1 )) ; then  # Correct number of arguments
		# TODO: Convert to generic loop
		if [ -f .example-template.c ] && [ ! -f "${1}/example.c" ] ; then  # example-00.c template exists
			cp .example-template.c "${1}/example.c"
		fi
	fi
}

if (( ${#} != 2 )) ; then  # Incorrect number of arguments
	usage
elif (( ${#} == 2 )) ; then  # Correct number of arguments
	case ${1} in  # Type of meeting to create
		class )  # Class Meeting
			dir="class/${2}"
			if [ ! -d "${dir}" ] ; then
				mkdir -p "${dir}"
			fi
			# Core files for meeting type
			copyCoreFiles "${dir}"
			if [ -f .notes-template.pptx ] && [ ! -f "${dir}/notes.pptx" ] ; then  # notes-template.pptx template exists
				cp .notes-template.pptx "${dir}/notes.pptx"
			fi
			if [ -f .assign-template.docx ] && [ ! -f "${1}/assign.docx"] ; then
				cp .assign-template.docx "${1}/assign.docx"
			fi
			# Example files
			copyExampleFiles "${dir}"
			;;
		lab )  # Lab Meeting
			dir="lab/${2}"
			if [ ! -d "${dir}" ] ; then
				mkdir -p "${dir}"
			fi
			# Core files for meeting type
			copyCoreFiles "${dir}"
			if [ -f .prgm-template.docx ] && [ ! -f "${dir}/pgrm.docx" ] ; then  # prgm-template.docx template exists
				cp .prgm-template.docx "${dir}/prgm.docx"
			fi
			copyExampleFiles "${dir}"
			;;
		quiz )
			dir="quiz/${2}"
			if [ ! -d "${dir}" ] ; then
				mkdir -p "${dir}"
			fi
			# Core files for meeting type
			copyCoreFiles "${dir}"
			if [ -f .assign-template.docx ] && [ ! -f "${dir}/quiz.docx" ] ; then  # assign-template.docx template exists
				cp -f .assign-template.docx "${dir}/quiz.docx"
			fi
			;;
		exam )  # Exam meeting
			dir="exam/${2}"
			if [ ! -d "${dir}" ] ; then
				mkdir -p "${dir}"
			fi
			# Core files for meeting type
			if [ -f .exm-template.docx ] && [ ! -f "${dir}/assign.docx" ] ; then  # exm-template.docx template exists
				cp -f .exm-template.docx "${dir}/assign.docx"
			fi
			copyCoreFiles "${dir}"
			;;
		info )
			dir="info/${2}"
			if [ ! -d "${dir}" ] ; then
				mkdir -p "${dir}"
			fi
			if [ -f .index-template.html ] && [ ! -f "${dir}/index.html" ] ; then  # Meeting template
				cp .index-template.html "${dir}/index.html"
			fi
			;;
		resources )
			dir="resources/${2}"
			if [ ! -d "${dir}" ] ; then
				mkdir -p "${dir}"
			fi
			if [ -f .index-template.html ] && [ ! -f "${dir}/index.html" ] ; then  # Meeting template
				cp .index-template.html "${dir}/index.html"
			fi
			;;
		review )
			dir="review/${2}"
			if [ ! -d "${dir}" ] ; then
				mkdir -p "${dir}"
			fi
			copyCoreFiles "${dir}"
			;;
		*)  # Incorrect meeting type
			echo ${usage}
			;;
	esac
	# Course work revision control system
	git status -s 2> /dev/null && git add "${dir}"  # Using git for revision control
fi
