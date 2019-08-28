<div class="container">
  <?= $this->Form->create('', ['type' => 'GET']); ?>
  <div class="row">
      <?php
   $myTemplates = [
            'inputContainer' => '<div class="form-group">{{content}}</div>',
            'input' => '<input type="{{type}}" class="form-control" name="{{name}}"{{attrs}}/>'
        ];
        $this->Form->setTemplates($myTemplates);
  ?>
    <div class="col-sm-2">
      <?= $this->Form->controls(
                [
                    'full_name' => ['placeholder' => 'Search Name']
                ],
                ['legend' => false]
            ) ?>
    </div>
        <div class="col-sm-2">
      <?= $this->Form->controls(
                [
                    'phone' => ['placeholder' => 'Search Phone']
                ],
                ['legend' => false]
      ) ?>
    </div>
    <div class="col-sm-2">
      <?= $this->Form->controls(
                [
                    'email' => ['placeholder' => 'Search Email'],
                ],
                 ['legend' => false]
      ) ?>
    </div>
    <div class="col-sm-2">
            <?= $this->Form->controls(
                [
                    'date_start' => ['placeholder' => 'Date Start', 'id' => 'datestart', 'text' => false]
                ],
                ['legend' => false])
            ?>
    </div>
    <div class="col-sm-2">
            <?= $this->Form->controls(
                ['date_end' => [
                    'placeholder' => 'Date End', 'id' => 'dateend', 'text' => false
                ]
                ],
                ['legend' => false]) ?>
    </div>
    <div class="col-sm-2">
      <div class="pull-right" style="margin-top:30px;">
        <button class="btn btn-sm btn-primary">Search</button>
            <?php echo '&nbsp'; ?>
         <div style="float: left;">
          <?php echo $this->Html->link('ADD', ['action' => 'add'], ['class' => 'btn btn-sm btn-success']) ?>
        </div>
      </div>
    </div>
  </div>
  <?= $this->Form->end() ?>
  <br/>
   <table class="table table-striped w-auto" style="border-style: solid; border-color: #ffff80;">
        <thead class="" style="font-weight: bold; background: #ff8000;">
                    <tr>
                        <th scope="col"><?= $this->Paginator->sort('id') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('full_name') ?></th>
                        <th scope="col"  style="color: #007bff;">Group</th>
                        <th scope="col"><?= $this->Paginator->sort('phone') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('email') ?></th>
                        <th scope="col"><?= $this->Paginator->sort('bithday') ?></th>
                        <th scope="col" style="color: #007bff;" class="actions"><?= __('Actions') ?></th>
                    </tr>
        </thead>
        <tbody>
                    <?php foreach ($customers as $cus): ?>
                    <tr>
                        <td><?= $this->Number->format($cus->id) ?></td>
                        <td><?= h($cus->full_name) ?></td>
                        <td>
                          <?php
                            foreach ($customer_group as $value) {
                              if($value['customer_id'] == $cus->id){
                                 echo '[' . $value['group_id'] . ']';
                              }
                            }
                         ?>
                        </td>
                        <td><?= h($cus->phone) ?></td>
                        <td><?= h($cus->email) ?></td>
                        <td><?= $cus->bithday->i18nFormat('dd-MM-yyyy') ?></td>
                        <td class="actions">
                            <?= $this->Html->link(__('View'), ['action' => 'view', $cus->id]) ?>
                            <?= $this->Html->link(__('Edit'), ['action' => 'edit', $cus->id]) ?>
                            <?= $this->Form->postLink(__('Delete'), ['action' => 'delete', $cus->id], ['confirm' => __('Bạn có chắc rằng muốn xóa {0}?', $cus->full_name)]) ?>
                        </td>
                    </tr>
                    <?php endforeach; ?>
        </tbody>
    </table>
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
</div>
<script type="text/javascript">
  $(function() {
    $("#datestart").datepicker({ 
      dateFormat: "yy-mm-dd",
      changeMonth: true,
      changeYear: true

    });
     $("#dateend").datepicker({ 
      dateFormat: "yy-mm-dd",
      changeMonth: true,
      changeYear: true

    });
  });
</script>
 