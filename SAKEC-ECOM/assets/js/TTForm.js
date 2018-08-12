function TTForm(){
	this.questions = [
		"Time-Table for class?",
		"No. of lectures per day?",
		"No. of courses?",
		"Course name?",
		"Course hours?",
		"No. of Guide assigned to course?",
		"Guide name?",
		"Guide hours in course?",
	];	
	this.answers = {
		ttClass,
		lecPerday,
		crsRep1Day,
		b2blecs41Crs1D,
		noOfCrs,
		crsName,
		crsHrs,
		noOfGuides,
		guideName[],
		guidehrs[],
	};
	this.answers = [];
	this.questCount = 0;

	$('#quest').text(this.questions[questCount]);
	$('#answer').attr("name", this.questID[questCount]);
	this.questCount++;
}

TTForm.prototype.constructor = TTForm;

TTForm.prototype.nextQuest = function(){
	this.answers.push($('#answer').val());

	$('#quest').text(this.questions[questCount]);
	$('#answer').attr("name", this.questID[questCount]);
	this.questCount++;

}