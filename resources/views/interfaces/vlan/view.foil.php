<?php
/** @var Foil\Template\Template $t

 */

$this->layout( 'layouts/ixpv4' )
?>

<?php $this->section( 'title' ) ?>
    <a href="<?= route( 'interfaces/vlan/list' )?>">Vlan Interfaces</a>
<?php $this->append() ?>

<?php $this->section( 'page-header-postamble' ) ?>
    <li>View Vlan Interface</li>
<?php $this->append() ?>

<?php $this->section( 'page-header-preamble' ) ?>
    <li class="pull-right">
        <div class="btn-group btn-group-xs" role="group">
            <a type="button" class="btn btn-default" href="<?= route( 'interfaces/vlan/list' )?>" title="list">
                <span class="glyphicon glyphicon-th-list"></span>
            </a>
            <a type="button" class="btn btn-default" href="<?= route('interfaces/vlan/edit' , [ 'id' => $t->vli->getId() ] ) ?>" title="edit">
                <span class="glyphicon glyphicon-pencil"></span>
            </a>
        </div>
    </li>
<?php $this->append() ?>

<?php $this->section( 'content' ) ?>
<div class="row">


    <div class="col-sm-12">

        <div class="panel panel-default">
            <div class="panel-heading">
                VLAN Interface Details
            </div>
            <div class="panel-body">
                <div class="col-xs-6">
                    <table class="table_view_info">
                        <tr>
                            <td>
                                <b>
                                    Customer:
                                </b>
                            </td>
                            <td>
                                <a href="<?= route( "customer@overview" , [ "id" => $t->vli->getVirtualInterface()->getCustomer()->getId() ] ) ?>">
                                    <?= $t->ee( $t->vli->getVirtualInterface()->getCustomer()->getName() )   ?>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>
                                    VLAN Name:
                                </b>
                            </td>
                            <td>
                                <a href="<?= route( 'vlan@view', [ "id" => $t->vli->getVlan()->getId() ] ) ?>">
                                    <?= $t->ee( $t->vli->getVlan()->getName() ) ?>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>
                                    IPv4:
                                </b>
                            </td>
                            <td>
                                <?= $t->vli->getIpv4enabled() ? '<span class="label label-success">Enabled</span>' : '<span class="label label-danger">Disabled</span>' ?>
                                <?php if( $t->vli->getIpv4enabled() ): ?>
                                    <br><br>
                                    <?= $t->ee( $t->vli->getIPv4Address()->getAddress() ) ?>
                                    <br>
                                    <?= $t->ee( $t->vli->getIPv4HostName() ) ?>
                                    <br>
                                    <?= $t->vli->getIPv4CanPing() ? '<span class="label label-success">Can Ping</span>' : '' ?>
                                    &nbsp;
                                    <?= $t->vli->getIpv4monitorrcbgp() ? '<span class="label label-success">Monitor RC BGP</span>' : '' ?>
                                    <br>
                                <?php endif ?>
                                <br/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>
                                    BGP IPv4 MD5:
                                </b>
                            </td>
                            <td>
                                <code><?= $t->ee( $t->vli->getIpv4bgpmd5secret() ) ?></code>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>
                                    Route Server Client:
                                </b>
                            </td>
                            <td>
                                <?= $t->vli->getRsclient() ? '<i class="glyphicon glyphicon-ok"></i>' : '<i class="glyphicon glyphicon-remove"></i>'   ?>
                            </td>
                        </tr>
                        <?php if( $t->vli->getRsClient() ): ?>
                            <tr>
                                <td>
                                    <b>
                                        &nbsp;&nbsp;&nbsp;&nbsp;IRRDB Filtering:
                                    </b>
                                </td>
                                <td>
                                    <?= $t->vli->getIrrdbfilter() ? '<i class="glyphicon glyphicon-ok"></i>' : '<i class="glyphicon glyphicon-remove"></i>' ?>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <b>
                                        &nbsp;&nbsp;&nbsp;&nbsp;Allow More Specifics:
                                    </b>
                                </td>
                                <td>
                                    <?= $t->vli->getRsmorespecifics() ? '<i class="glyphicon glyphicon-ok"></i>' : '<i class="glyphicon glyphicon-remove"></i>' ?>
                                </td>
                            </tr>
                        <?php endif; ?>
                        <tr>
                            <td>
                                <b>
                                    Notes :
                                </b>
                            </td>
                            <td>
                                <?= $t->ee( $t->vli->getNotes() ) ?>
                            </td>
                        </tr>
                    </table>
                </div>

                <div class="col-xs-6">
                    <table class="table_view_info">
                        <tr>
                            <td>
                                <b>
                                    Multicast:
                                </b>
                            </td>
                            <td>
                                <?= $t->vli->getMcastenabled() ? '<span class="label label-success">Enabled</span>' : '<span class="label label-danger">Disabled</span>' ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>
                                    Max BGP Prefixes:
                                </b>
                            </td>
                            <td>
                                <?= $t->vli->getMaxbgpprefix() ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>
                                    IPv6:
                                </b>
                            </td>
                            <td>
                                <?= $t->vli->getIpv6enabled() ? '<span class="label label-success">Enabled</span>' : '<span class="label label-danger">Disabled</span>' ?>
                                <?php if( $t->vli->getIpv6enabled() ): ?>
                                    <br><br>
                                    <?= $t->ee( $t->vli->getIPv6Address()->getAddress() ) ?>
                                    <br>
                                    <?= $t->ee( $t->vli->getIPv6HostName() )?>
                                    <br>
                                    <?= $t->vli->getIPv6CanPing() ? '<span class="label label-success">Can Ping</span>' : '' ?>
                                    &nbsp;
                                    <?= $t->vli->getIpv6monitorrcbgp() ? '<span class="label label-success">Monitor RC BGP</span>' : '' ?>
                                    <br>
                                <?php endif; ?>
                                <br/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>
                                    BGP IPv6 MD5:
                                </b>
                            </td>
                            <td>
                                <code><?= $t->ee( $t->vli->getIpv6bgpmd5secret() )?></code>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <b>
                                    Busy Host:
                                </b>
                            </td>
                            <td>
                                <?= $t->vli->getBusyhost() ? 'Yes' : 'No' ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <b>
                                    AS112 Client:
                                </b>
                            </td>
                            <td>
                                <?= $t->vli->getAs112client() ? 'Yes' : 'No' ?>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>

    </div>
</div>

<?php $this->append() ?>