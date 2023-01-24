<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    {include file='./inc/links.tpl'}
    <title>Ucertify Online Test</title>
</head>
<body>
{include file='./inc/header.tpl'} 
<div class="container mt-5">
    <div class="row">
        <div class="col-12">
           <ul class="list-group list-group-numbered">
              <li class="bg-light p-2 fw-bold fs-5">Question  : 
                <span id="question" class="bg-light p-2 fw-bold fs-5" data-id="{$data['content_id']}"></span>
                <!-- <input type="hidden" id="Cid"/> -->
              </li>
              <li id="answer" class="fs-6 fw-bold mt-3">
                <input type="radio" name="ans" class="abc">
                <input type="radio" name="ans" class="abc">
                <input type="radio" name="ans" class="abc">
                <input type="radio" name="ans" class="abc">
              </li> 
           </ul>
        </div>
    </div>
</div>
<!-------------Modal for list-------------->
<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasExample" aria-labelledby="offcanvasExampleLabel">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title" id="offcanvasExampleLabel">Offcanvas</h5>
    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body d-flex justify-content-between">
    <div>
      <ol class="list-group">
        {assign var=counter value=1}
         {foreach $data as $row} 
            <li class="list-group-item">
              {if $session[$row['content_id']] == "attempted"}
              <a id="{$row['content_id']}" class="fw-bold questionList">{$counter++} : {$row['snippet']}
                 <span class="badge text-bg-success" id="{$row['content_id']}">Attempted</span>
              </a>
              {else}
              <a id="{$row['content_id']}" class="fw-bold questionList">{$counter++} : {$row['snippet']}
                <span class="badge text-bg-danger" id="{$row['content_id']}">Not Attempted</span>
              </a>
              {/if}
            </li>
         {/foreach}
      </ol>
    </div>
  </div>
</div>

  <!--------- end modal ------------>
  <div class="modal fade" id="static" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h1 class="modal-title fs-5" id="staticBackdropLabel">Do you want to End this Exam?</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <table class="table table-striped table-responsive">
            <thead class="table-success">
              <tr>
                <th scope="col">Total Question: </th>
                <th scope="col">Attempt Question: </th>
                <th scope="col">Not Attempt Question: </th>
                <th scope="col">Remaining Questions: </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <th scope="row"> {$totalpage}</th>
                <td></td>
                <td>Otto</td>
                <td>@mdo</td>
              </tr>
            </tbody>
          </table>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" id="No-cancel">No</button>
          <button type="button" class="btn btn-primary" id="yes-cancel">Yes</button>
        </div>
      </div>
    </div>
  </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-12 position-fixed bottom-0">
                <ul class="pagination justify-content-center align-items-center bg-light border-top border-2 pt-2">
                  <i class="bi bi-stopwatch fs-2 mx-0"></i><div class="mx-3 fw-bold fs-5 text-dark" id="countTimer"></div>
                    <button class="page-link shadow-none fw-bold text-dark" id="list" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasExample">List</button>
                    <button class="page-link shadow-none mx-3 fw-bold text-dark" id="previous" type="button" data-id="{counter}">Previous</button>
                    <h6><span id="current_question">1</span> of <span id="total_question">{$totalpage}</span></h6>
                    <button class="page-link shadow-none mx-3 fw-bold text-dark" id="next" type="button" data-id="{counter}" value="submit">Next</button>
                    <button class="page-link shadow-none fw-bold text-dark" id="end-test" type="button" data-bs-toggle="modal" data-bs-target="#static">End Test</button>
                </ul>
            </div>
        </div>  
    </div>
 {include file='./inc/script.tpl'}
</body>
</html>