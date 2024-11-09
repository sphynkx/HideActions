<?php

namespace MediaWiki\Extension\HideActions;

class Hooks implements \MediaWiki\Hook\BeforePageDisplayHook {

	/**
	 * @see https://www.mediawiki.org/wiki/Manual:Hooks/BeforePageDisplay
	 * @param \OutputPage $out
	 * @param \Skin $skin
	 */
	public function onBeforePageDisplay( $out, $skin ): void {

	    ## The 'raw' doesnt block by this funtion. Need to set `$wgActions['raw'] = false;` in LocalSettings.php
	    $blockedactions = array('raw', 'history', 'delete', 'revert', 'rollback', 'protect', 'unprotect', 'markpatrolled', 'deletetrackback', 'edit', 'blockdiff', 'submit');
	    $action = $out->getActionName();

	    if ( $out->getUser()->mId == 0 and in_array( $action, $blockedactions) ) {
		$out->prepareErrorPage( $out->getTitle(), false ) ;
		$out->addHTML( \Html::element( 'h2', [], wfMessage( 'hideactions-xsdenied' )->text() ) );
	    }
	}

}
