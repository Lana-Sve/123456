<!DOCTYPE html>
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="css.css">
</head>
<body>
<h1></h1>


<?php
define('C_REST_WEB_HOOK_URL','https://uttest4.bitrix24.ru/rest/1/itgtjr8s4afogse0/');

require_once('crest.php');

// put an example below
echo '<PRE>';
print_r(CRest::call(
   'crm.lead.add',
   [
      'fields' =>[
      'TITLE' => 'Название лида',//Заголовок*[string]
      'NAME' => 'Имя',//Имя[string]
      'LAST_NAME' => 'Фамилия',//Фамилия[string]
      ]
   ])
);

echo '</PRE>';
?>

<?
$resultLeads = CRest::call('crm.status.list', ['filter' => ['ENTITY_ID' => 'STATUS']]);
if (!empty($resultLeads['result'])):?>
    <table>
        <thead>
        <tr>
            <th>STATUS ID</th>
            <th>NAME</th>
            <th>SEMANTICS</th>
        </tr>
        </thead>
        <tbody>
        <? foreach ($resultLeads['result'] as $item): ?>
        <tr <?=(!empty($item['EXTRA']['COLOR']) ? ' style="color:' . $item['EXTRA']['COLOR'] . '"' : '');?>>
            <td><?=$item['STATUS_ID']?></td>
            <td><?=$item['NAME']?></td>
            <td><?=$item['EXTRA']['SEMANTICS']?></td>
        <tr>
            <? endforeach;
            ?>
        </tbody>
    </table>
<? endif; ?>
  
</body>
</html>  
