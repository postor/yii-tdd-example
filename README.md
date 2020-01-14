# yii2 测试驱动开发示例 | TDD example for yii2

quick glance: https://www.youtube.com/watch?v=GdVmYISOqA8&list=PLM1v95K5B1ntVsYvNJIxgRPppngrO_X4s

## 环境准备

创建项目 | create project

![创建项目 | create project](./screenshots/create-project.png)

初始化项目 | init project

![初始化项目](./screenshots/init-project.png)

创建数据库和表 | create tables

![创建数据库和表](./screenshots/db-table.png)
![创建数据库和表](./screenshots/db-table2.png)

配置db，注意同样调整 `test-local.php` | config db, don't forget `test-local.php`

![配置db](./screenshots/config-db.png)

初始化 user | initiallize user

![初始化user](./screenshots/init-project-2.png)

生成model（同理生成user_role的）| generate models

![生成model](./screenshots/create-model-1.png)
![生成model](./screenshots/create-model-2.png)
![生成model](./screenshots/create-model-3.png)

准备代码骨架 | code skeleton

![准备代码骨架](./screenshots/code-skeleton.png)


## 写测试 | write tests

单元测试源码 | test codes [common/tests/unit/models/custom/CustomIssueTest.php](./common/tests/unit/models/custom/CustomIssueTest.php)

![单元测试源码](./screenshots/tests-code.png)

当然还要使用fixture准备一些mock环境，官方参考 | use fixture for mocking, refer https://www.yiiframework.com/doc/guide/2.0/zh-cn/test-fixtures

- [common/tests/unit/models/custom/CustomIssueTest.php](./common/tests/unit/models/custom/CustomIssueTest.php) 中的 `public function _fixtures()`
- [common/fixtures/IssueFixture.php](./common/fixtures/IssueFixture.php) 
- [common/fixtures/UserRolesFixture.php](./common/fixtures/UserRolesFixture.php)
- [common/tests/_data/custom_issue_issues.php](./common/tests/_data/custom_issue_issues.php)
- [common/tests/_data/custom_issue_user_roles.php](./common/tests/_data/custom_issue_user_roles.php)
- [common/tests/_data/custom_issue_users.php](./common/tests/_data/custom_issue_users.php)

现在运行应该是全失败的 | for now all should fail

 ![build](./screenshots/codecept-build.png)
 ![run](./screenshots/codecept-run1.png)
 ![run](./screenshots/codecept-run2.png)
 
 ## 开发代码 | develop features
 
 现在只要测试通过了，我的开发就算完成 | when the tests pass, our issues are done
 
 ### `function setVerified()`
 
 [common/models/custom/CustomIssue.php](./common/models/custom/CustomIssue.php)
 
 ![develop](./screenshots/develop-code.png)
 ![run](./screenshots/codecept-run3.png)
 
 ## 最后 | PS
 
 例子仅限于演示TDD开发流程，不代表最佳实践（例如数据表使用migration管理更合理，用户角色使用RBAC等） | this project is only showing how to adopt TDD, doest not represent best practices in yii2 (things like using migration is better than raw mysql operation)
 
 
 
