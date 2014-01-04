<?php
if (!defined('TYPO3_MODE')) {
	die ('Access denied.');
}

\TYPO3\CMS\Extbase\Utility\ExtensionUtility::registerPlugin(
	$_EXTKEY,
	'Cookiecuttr',
	'soee - CookieCuttr'
);

$pluginSignature = str_replace('_', '', $_EXTKEY) . '_cookiecuttr';
$TCA['tt_content']['types']['list']['subtypes_addlist'][$pluginSignature] = 'pi_flexform';
\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPiFlexFormValue($pluginSignature, 'FILE:EXT:' . $_EXTKEY . '/Configuration/FlexForm/CookiecuttrPlugin.xml');

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addPageTSConfig(
    'mod.wizards.newContentElement.wizardItems.soee {
        header = soee
        elements {
            cookiecuttr {
                icon = gfx/c_wiz/user_defined.gif
                title = Cookie Policy Bar
                description = Show cookie policy bar
                tt_content_defValues {
                    CType = list
                    list_type = soeecookiecuttr_cookiecuttr
                }
            }
        }
        show := addToList(cookiecuttr)
    }'
);

\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::addStaticFile($_EXTKEY, 'Configuration/TypoScript', 'soee - CookieCuttr');

?>
