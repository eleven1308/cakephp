<br/>
<div class="row">
	<div class="col-md-6">
		<h3>Customers</h3>
	</div>

	<div class="col-md-6 text-right">
		<?php echo $this->Html->link('ADD', ['action' => 'add'], ['class' => 'btn btn-sm btn-primary']) ?>
	</div>
   <?= $this->form->control('search');?>
</div>
<div class="table-content">
  <table class="table table-bordered table-striped">
    <thead>
                <tr>
                    <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('full_name') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                    <th scope="col"><?= $this->Paginator->sort('bithday') ?></th>
                    <th scope="col" class="actions"><?= __('Actions') ?></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($customers as $cus): ?>
                <tr>
                    <td><?= $this->Number->format($cus->id) ?></td>
                    <td><?= h($cus->full_name) ?></td>
                    <td><?= h($cus->email) ?></td>
                    <td><?= h($cus->bithday) ?></td>
                    <td class="actions">
                        <?= $this->Html->link(__('View'), ['action' => 'view', $cus->id]) ?>
                        <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cus->id]) ?>
                        <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cus->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cus->id)]) ?>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
  </table>
</div>
 <div class="paginator">
        <ul class="pagination">
            <?= $this->Paginator->first('<< ' . __('first')) ?>
            <?= $this->Paginator->prev('< ' . __('previous')) ?>
            <?= $this->Paginator->numbers() ?>
            <?= $this->Paginator->next(__('next') . ' >') ?>
            <?= $this->Paginator->last(__('last') . ' >>') ?>
        </ul>
        <p><?= $this->Paginator->counter(['format' => __('Page {{page}} of {{pages}}, showing {{current}} record(s) out of {{count}} total')]) ?></p>
</div>

<script>
    $('document').ready(function(){
         $('#search').keyup(function(){
            var searchkey = $(this).val();
            console.log(searchkey);
            searchTags( searchkey );
         });

        function searchTags(keyword){
        var data = keyword;
        $.ajax({
                    method: 'get',
                    url : "<?php echo $this->Url->build( [ 'controller' => 'Customers', 'action' => 'search' ] ); ?>",
                    data: {
                      keyword: data
                    },
                    success: function( response )
                    {       
                        console.log(keyword);
                       $( '.table-content' ).html(response);
                    }
                });
        };
    });
</script>
 <!--  -->

 