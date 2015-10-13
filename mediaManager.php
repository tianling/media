<?php
	class mediaManager{

		public function syncFile($fpath){
			$ffprobeCmd = sprintf('ffprobe -v quiet -print_format json -show_format -show_streams "%s"', $fpath);
			exec($ffprobeCmd,$output,$status);
			var_dump($output);
		}
	}

