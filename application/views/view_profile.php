<table border="0" style="color:#FFD700;">
    <tr>
        <td></td>
        <td></td>
    </tr>
    <tr>
        <td></td>
        <td>اسمك: </td>
        <td><?php echo $name; ?></td>
    </tr>
    <tr>
        <td></td>
        <td>بريدك الالكتروني: </td>
        <td><?php echo $email; ?></td>
    </tr>
    <tr>
        <td></td>
        <td>البريد الالكتروني اللي هاتبعت له: </td>
        <td> <?php echo $nemail; ?></td>
    </tr>		
</table>
<form method="post" action="<?php echo base_url();?>users/edit_profile_v">
	<input type="submit" data-inline="true" data-theme="e" value="عدل بروفايلك">
</form>