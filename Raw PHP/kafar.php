<?php
	function kafar($params)	{
		$outHTML = '';
		$params = array_map('trim', $params);
	
		if (isset($params['go'])) {
			
			switch ($params['go']) {
				case 'spinner': $go = ['ico' => 'spinner', 'spin' => 1]; break;
				case 'pulse-spinner': $go = ['ico' => 'spinner', 'spin' => 2]; break;
				case 'gear-spinner': $go = ['ico' => 'cog', 'spin' => 1]; break;
				
				case 'yes': $go = ['ico' => 'check', 'color' => '#30971D']; break;
				case 'no': $go = ['ico' => 'times', 'color' => '#AD0707']; break;
				case 'info': $go = ['ico' => 'info-circle', 'color' => '#3152A5']; break;
				
				case 'yt': $go = ['ico' => 'youtube-square', 'color' => '#CC181E']; break;
				case 'fb': $go = ['ico' => 'facebook-square', 'color' => '#3D5A99']; break;
				case 'twitter': $go = ['ico' => 'twitter-square', 'color' => '#55ACEE']; break;
				
				case 'outer-quote-start': $go = ['ico' => 'quote-left', 'scale' => 1, 'pull' => 'l', 'cssInternal' => 'opacity:0.5;margin-left:-1.2em']; break;
				case 'outer-quote-end': $go = ['ico' => 'quote-right', 'scale' => 1, 'pull' => 'r', 'cssInternal' => 'opacity:0.5;margin-right:-1.2em']; break;				
				case 'outer-info': $go = ['ico' => 'info-circle', 'color' => '#3152A5', 'scale' => 2, 'pull' => 'l', 'cssInternal' => 'margin-left:-1.2em']; break;
				case 'outer-warning': $go = ['ico' => 'exclamation-triangle', 'color' => '#D8460C', 'scale' => 2, 'pull' => 'l', 'cssInternal' => 'margin-left:-1.2em']; break;
				default: $go = [];
			}
			
			
			if (isset($go['cssInternal']) && isset($params['css'])) $params['css'] = "$go[cssInternal];$params[css]"; elseif (isset($go['cssInternal'])) $params['css'] = $go['cssInternal'];
			
			$params = array_replace($params, $go);
		}
		
		$html['class'][] = 'fa';
		// (str)ico
		if (!empty($params['ico'])) $html['class'][] = "fa-$params[ico]"; else return;
		
		// (int)scale	
		if (isset($params['scale']) && filter_var($params['scale'], FILTER_VALIDATE_INT, ['options' => ['min_range' => 1, 'max_range' => 5]])) {
			$fa['scale'] = ['', 'lg', '2x', '3x', '4x', '5x'];
			$html['class'][] = "fa-{$fa['scale'][$params['scale']]}";
		}
		
		// (bool)fixed, (bool)list, (bool)border
		$boolParams = ['fixed' => 'fw', 'list' => 'li', 'border' => 'border'];
		foreach ($boolParams as $param => $class) if (isset($params[$param]) && filter_var($params[$param], FILTER_VALIDATE_BOOLEAN)) $html['class'][] = "fa-$class";
		
		// (str/chr)pull
		if (isset($params['pull'])) {
			if ($params['pull'] === 'l' || $params['pull'] === 'left') $html['class'][] = 'fa-pull-left'; elseif ($params['pull'] === 'r' || $params['pull'] === 'right') $html['class'][] = 'fa-pull-right'; 
		}
		
		// (int)spin
		if (isset($params['spin'])) {
			if ($params['spin'] == 2) $html['class'][] = 'fa-pulse'; elseif (filter_var($params['spin'], FILTER_VALIDATE_BOOLEAN)) $html['class'][] = 'fa-spin';
		}
		
		// (int/str)rotate
		if (isset($params['rotate'])) {
			if ($params['rotate'] === '90' || $params['rotate'] === '>') $html['class'][] = 'fa-rotate-90'; elseif ($params['rotate'] === '180' || $params['rotate'] === 'u') $html['class'][] = 'fa-rotate-180'; elseif ($params['rotate'] === '270' || $params['rotate'] === '<') $html['class'][] = 'fa-rotate-270'; 
		}
		
		// (str/chr)flip
		if (isset($params['flip'])) {
			if ($params['flip'] === 'h' || $params['flip'] === '-') $html['class'][] = 'fa-flip-horizontal'; 
			if ($params['flip'] === 'v' || $params['flip'] === '|') $html['class'][] = 'fa-flip-vertical'; 
		}
		
		// (str)class
		if (isset($params['class'])) $html['class'][] = $params['class'];
		
		// (str)id
		if (isset($params['id'])) $html['id'] = $params['id'];
		
		// (str)title
		if (isset($params['title'])) $html['title'] = $params['title'];
		
		// (str)css
		if (isset($params['css'])) $html['style'][] = trim($params['css'], '; ');
		
		// (str)color
		if (isset($params['color'])) $html['style'][] = 'color:' . trim($params['color'], ';');
		
		// (mixed)data
		$allKeys = array_keys($params);
		foreach ($allKeys as $paramName) if (substr($paramName, 0, 5) === 'data-') $html[$paramName] = $params[$paramName];
		
		$html['class'] = implode(' ', $html['class']);
		if (!empty($html['style'])) $html['style'] = implode(';', $html['style']);
		
		foreach ($html as $attr => $data) $outHTML .= " $attr=\"$data\"";
		
		$html = "<i$outHTML></i>";
		
		// (int)lspace and (int)rspace
		$uniSpaces = ['feff', '2003', '2002', '2004', '2005', '2009', '2006'];
		if (isset($params['lspace']) && isset($uniSpaces[$params['lspace']])) $html = "&#x{$uniSpaces[$params['lspace']]};$html";
		if (isset($params['rspace']) && isset($uniSpaces[$params['rspace']])) $html .= "&#x{$uniSpaces[$params['rspace']]};";
		
		return $html;
	}
