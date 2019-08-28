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
                    'class' => ($this->Form->isFieldError('full_name')) ? 'form-control is-invalid' : 'form-control'
                ],
                'email' => [
                    'placeholder' => "Email", 
                    'required' => false,
                    'class' => ($this->Form->isFieldError('email')) ? 'form-control is-invalid' : 'form-control'
                ],
                'phone' => [
                    'placeholder' => "Phone", 
                    'required' => false,
                    'class' => ($this->Form->isFieldError('phone')) ? 'form-control is-invalid' : 'form-control'
                ],
                'birthday' => [
                    'id' => 'datepicker',
                    'placeholder' => "Date",
                    'class' => ($this->Form->isFieldError('birthday')) ? 'form-control is-invalid' : 'form-control',
                    'required' => false
                ],
                'group' => [
                    'placeholder' => "Group",
                    'type' => 'select',
                    'options' => $group_id,
                    'multiple' => 'multiple',
                    'old' => $group_id,
                    'default' => 1, 
                    'class' => ($this->Form->isFieldError('group')) ? 'form-control is-invalid' : 'form-control group'
                ],
            ],
            ['legend' => 'Add Customer']
        );
        echo $this->Form->button('<i class="fa fa-plus"></i>Save', [
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

</div>

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