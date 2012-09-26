var fs = require('fs')
 , less = require('less')
 , exec = require('child_process').exec
 , uglyfyJS = require('uglify-js')
 , outputPath = './bin/'
 , srcPath = './src/'
 , zipName = 'joomla-bootstrap-template.zip'
 , bootstrapPath = './bootstrap/'
 //Temp/help variables
 , tmpImgFileName
 , fileEncoding = 'utf-8'
 , eof = '\n';
 
 
 
	/** Cleanup **/
	//delete old zip file
	if(fs.existsSync(outputPath+zipName)) {
		fs.unlinkSync(outputPath+zipName);
	}
	//delete old bootstrap.js
	if(fs.existsSync(srcPath+'js/bootstrap.js')) {
		fs.unlinkSync(srcPath+'js/bootstrap.js');
	}
	if(fs.existsSync(srcPath+'js/bootstrap.min.js')) {
		fs.unlinkSync(srcPath+'js/bootstrap.min.js');
	}

	/** Copy bottstrap img **/
	//** Icons: 
	tmpImgFileName = 'glyphicons-halflings.png';
	fs.writeFileSync(
		srcPath+'/ico/'+tmpImgFileName
		, fs.readFileSync(bootstrapPath+'/img/'+tmpImgFileName)
	);
	tmpImgFileName = 'glyphicons-halflings-white.png';
	fs.writeFileSync(
		srcPath+'/ico/'+tmpImgFileName
		, fs.readFileSync(bootstrapPath+'/img/'+tmpImgFileName)
	);
	
	/** Merge, Copy and Uglify bootstrap.js **/
	concatFiles({
		files:[
		bootstrapPath +'js/bootstrap-transition.js'
		, bootstrapPath +'js/bootstrap-alert.js'
		, bootstrapPath +'js/bootstrap-button.js'
		, bootstrapPath +'js/bootstrap-carousel.js'
		, bootstrapPath +'js/bootstrap-collapse.js'
		, bootstrapPath +'js/bootstrap-dropdown.js'
		, bootstrapPath +'js/bootstrap-modal.js'
		, bootstrapPath +'js/bootstrap-tooltip.js'
		, bootstrapPath +'js/bootstrap-popover.js'
		, bootstrapPath +'js/bootstrap-scrollspy.js'
		, bootstrapPath +'js/bootstrap-tab.js'
		, bootstrapPath +'js/bootstrap-typeahead.js'
		, bootstrapPath +'js/bootstrap-affix.js'
		]
		, dest: srcPath+'js/bootstrap.js'
	});
	/** Uglify bootstrap.js **/
	uglifyJs({
		src:srcPath+'js/bootstrap.js'
		, dest: srcPath+'js/bootstrap.min.js'
	});
	
	
function concatFiles(options) {
	var fileList = options.files;
	var distPath = options.dest;
	var out = fileList.map(function(filePath){
		return fs.readFileSync(filePath, fileEncoding);
	});
	fs.writeFileSync(distPath, out.join(eof), fileEncoding);
	console.log(' '+ distPath +' built.');
}

function uglifyJs(options) {
	var srcPath = options.src
	, distPath = options.dest
	, jsp = uglyfyJS.parser
	, pro = uglyfyJS.uglify
	, ast = jsp.parse( fs.readFileSync(srcPath, fileEncoding) );

	ast = pro.ast_mangle(ast);
	ast = pro.ast_squeeze(ast);

	fs.writeFileSync(distPath, pro.gen_code(ast), fileEncoding);
	console.log(' '+ distPath +' built.');
}

//Googles Java JS Compiler
function jsCompile(srcPath, distPath) {
	// exec is asynchronous
	exec(
		'java -jar '+ jsCompiler +' --js '+ srcPath +' --js_output_file '+ distPath,
		function (error, stdout, stderr) {
			if (error) {
				console.log(stderr);
			} else {
					console.log(stdout);
					console.log(' '+ distPath + ' built.');
			}
		}
	);
}
	
	