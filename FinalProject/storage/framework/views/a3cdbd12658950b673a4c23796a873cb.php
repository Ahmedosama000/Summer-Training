


<?php $__env->startSection('content'); ?>

<script>
    $(document).ready(function() {
      // ربط حدث `change` بعنصر `select`
      $("#category").on("change", function() {
        // إنشاء طلب ajax إلى route لتلقي اسم القسم
        $.ajax({
          url: "/ajax/section",
          type: "post",
          data: {
            id: $(this).val()
          },
          success: function(data) {
            // تحديث قيمة div `#sectionName`
            $("#sectionName").html(data);
          }
        });
      });
    });
    </script>
    <select id="category">
      <option value="1">Category 1</option>
      <option value="2">Category 2</option>
      <option value="3">Category 3</option>
    </select>
    <div id="sectionName"></div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.app', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH F:\Ahmed\Courses\My courses\Summer-Train\FinalProject\resources\views/test.blade.php ENDPATH**/ ?>