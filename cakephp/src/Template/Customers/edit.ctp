<div class="container card">
    <?php
        # Set Form Template
        $myTemplates = [
            'inputContainer' => '<div class="form-group">{{content}}</div>',
            // 'input' => '<input type="{{type}}" class="form-control is-invalid" name="{{name}}"{{attrs}}/>',
            'inputContainerError' => '<div class="form-group {{required}} error">{{content}}{{error}}</div>',
            'error' => '<div class="invalid-feedback">{{content}}</div>',
        ];
        $this->Form->setTemplates($myTemplates);

        echo $this->Form->create($customer);

        # Check field error
        // var_dump($this->Form->isFieldError('fullname'));
        $group_id = ['1' => 1, '2' => 2, '3' => 3, '4' => 4, '5' => 5];
        echo $this->Form->controls(
            [
                'full_name' => [
                    'placeholder' => "Full Name", 
                    'required' => false,
                    'label' => 'Full Name',
                    'value' => $customer->full_name,
                    'class' => ($this->Form->isFieldError('full_name')) ? 'form-control is-invalid' : 'form-control'
                ],
                'email' => [
                    'placeholder' => "Email", 
                    'required' => false,
                    'value' => $customer->email,
                    'class' => ($this->Form->isFieldError('email')) ? 'form-control is-invalid' : 'form-control'
                ],
                'phone' => [
                    'placeholder' => "Phone", 
                    'required' => false,
                    'value' => $customer->phone,
                    'class' => ($this->Form->isFieldError('phone')) ? 'form-control is-invalid' : 'form-control'
                ],
                'birthday' => [
                    'placeholder' => "Date",
                    'id' => 'datepicker',
                    'value' => $new_birthday,
                    'data-date-format' => 'yy-mm-dd',
                    'class' => 'form-control input-group date',
                    'required' => false
                    
                ],
                'group' => [
                    'placeholder' => "Group",
                    'type' => 'select',
                    'options' => $group_id,
                    'multiple' => 'multiple',
                    'default' => $groupid, 
                    'class' => ($this->Form->isFieldError('group')) ? 'form-control is-invalid' : 'form-control group'
                ],
            ],
            ['legend' => 'Edit Customer']
        );
        echo $this->Form->button('<i class="fa fa-plus"></i>Update', [
            'class' => 'btn btn-success',
            'type' => 'submit', 
            'escape' => false
        ]);
        echo '&nbsp';
        echo $this->Html->link('Cancel', [
            'action' => 'index'],
            ['class' => 'btn btn-warning']
        );
        // echo $this->Form->submit('Registration', ['class' => 'btn btn-success']);
        echo $this->Form->end();
    ?>
<!-- <label>Chọn ngày: </label>
<div id="datepicker" class="input-group date" data-date-format="dd-mm-yyyy">
    <input class="form-control" readonly="" type="text"> <span class="input-group-addon"><i class="glyphicon glyphicon-calendar"></i></span> 
</div> -->
</div>
<!-- <style>
label{
    margin-left: 20px;
    }
    #datepicker{
    width:180px; 
    margin: 0 20px 20px 20px;
    }
    #datepicker > span:hover{
    cursor: pointer;
}
</style> -->
<script type="text/javascript">
$(function() {
    $("#datepicker").datepicker({ 
        dateFormat: "yy-mm-dd",
        changeMonth: true,
        changeYear: true
    });
  });
$(document).ready(function() {
    $('.group').select2();
});
</script>